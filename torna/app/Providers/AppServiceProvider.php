<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Validator::extend('unique_industry_based_on_flag', function ($attribute, $value, $parameters, $validator) {
                        
            // Check if a designation with the given name and flag 'show' exists
            $existingIndustry = \App\Models\Industry::where('industry_name', $value)
                ->where('flag', 'show')
                ->exists();
               
            if ($existingIndustry) {
                return false;
            } else {
                // If the department doesn't exist or if it doesn't have the flag 'show', return true
                return true;
            }    
            });

            Validator::extend('unique_product_based_on_flag', function ($attribute, $value, $parameters, $validator) {
                    $user = session('user');    
                // Check if a designation with the given name and flag 'show' exists
                $existingProduct = \App\Models\ProductDetail::where('product_name', $value)
                    ->where('created_by', $user->tbl_user_id)
                    ->where('flag', 'show')
                    ->exists();
                   
                if ($existingProduct) {
                    return false;
                } else {
                    // If the department doesn't exist or if it doesn't have the flag 'show', return true
                    return true;
                }    
                });

                Validator::extend('unique_document_based_on_flag', function ($attribute, $value, $parameters, $validator) {
                    $user = session('user');    
                // Check if a designation with the given name and flag 'show' exists
                $existingDocument = \App\Models\Document::where('doc_name', $value)
                    ->where('created_by', $user->tbl_user_id)
                    ->where('flag', 'show')
                    ->exists();
                   
                if ($existingDocument) {
                    return false;
                } else {
                    // If the department doesn't exist or if it doesn't have the flag 'show', return true
                    return true;
                }    
                });

                Validator::extend('unique_exhibition_based_on_flag', function ($attribute, $value, $parameters, $validator) {
                    $user = session('user');    
                // Check if a designation with the given name and flag 'show' exists
                $existingEx = \App\Models\ExhibitionDetail::where('exhibition_name', $value)
                    ->where('active_status', '!=', 'Past')
                    ->where('flag', 'show')
                    ->exists();
                   
                if ($existingEx) {
                    return false;
                } else {
                    // If the department doesn't exist or if it doesn't have the flag 'show', return true
                    return true;
                }    
                });


    }
}
