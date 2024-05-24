public function upcomingExhibitions()
    {
         $user = session('user');
         $approvedStatus = false;
         $userDetails = UserDetail::where('tbl_user_id', $user->tbl_user_id)->first();
         if($userDetails->active_status == 'Approved'){
            $approvedStatus = true;
         }

        $company = CompanyDetail::where('tbl_comp_id', $user->tbl_comp_id)->first();

        // if($user->role_id == '2'){
        //     $upcomingExs = ExhibitionDetail::where('active_status', 'Active')->where('flag', 'show')->get();
        //     foreach ($upcomingExs as $upcomingEx) {
        //         $upcomingEx->encExId = EncryptionDecryptionHelper::encdecId($upcomingEx->tbl_ex_id, 'encrypt');
        //             }

        //             return view('ExhibitorPages/upcomingExhibitions', ['upcomingExs' => $upcomingExs]);
        // }

        // $industry_name = $company->industry_name;
        // dd($industry_name);
        if($user->role_id == '3'){
            $upcomingExs = ExhibitionDetail::where(function ($query) use ($user) {
                $query->where('ex_created_by_role_id', '2') // Exhibitions created by users with role_id 2
                      ->orWhere('created_by', $user->tbl_user_id); // Exhibitions created by the logged-in user
            })
            ->where('active_status', 'Active')
            ->where('flag', 'show')
            ->where(function ($query) use ($company) {
                $query->where('industry', $company->industry_name)
                      ->orWhere('industry', 'others');
            })
            ->get();

        $showReminder = false;

        foreach ($upcomingExs as $upcomingEx) {
            $upcomingEx->encExId = EncryptionDecryptionHelper::encdecId($upcomingEx->tbl_ex_id, 'encrypt');
            $upcomingEx->participated = Participate::where('tbl_ex_id', $upcomingEx->tbl_ex_id)->where('tbl_user_id', $user->tbl_user_id)->exists();
            $upcomingEx->attach_document = base64_encode($upcomingEx->attach_document);


            if ($upcomingEx->participated) {
                // Check if email service is enabled in emailSetting table
               // $emailServiceEnabled = EmailSetting::where('email_service', 'enabled')->exists();
                $notify = Notify::where('tbl_user_id',$user->tbl_user_id)->where('tbl_ex_id',$upcomingEx->tbl_ex_id)->first();
                if ($notify) { // Ensure $notify is not null
                    if ($notify->email_service === 'enabled' || $notify->sms_service === 'enabled' || $notify->whatsapp_service === 'enabled') {
                        $emailSetting = EmailSetting::where('tbl_user_id', $user->tbl_user_id)->first();
                        if ($emailSetting && $emailSetting->smtp === null) {
                            $showReminder = true;
                        }
        
                        // $smsSetting = SMSSetting::where('tbl_user_id', $user->tbl_user_id)->first();
                        // if ($smsSetting && $smsSetting->sid === null) {
                        //     $showReminder = true;
                        // }
                        
                        // Similar checks for WhatsApp settings if needed
                    }
                }
                
            }

         }

                // dd($showReminder);
                return view('ExhibitorPages/upcomingExhibitions', ['upcomingExs' => $upcomingExs,'showReminder'=>$showReminder,'approvedStatus'=>$approvedStatus]);

            }

        
    }