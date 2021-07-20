<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */ 
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->from('fabricedjerabe17@gmail.com', 'Application alàn')
                ->greeting('Bonjour !')
                ->subject("Vérification de votre adresse e-mail")
                ->line("Cliquez sur le bouton ci-dessous pour vérifier votre adresse électronique afin de pouvoir vous connecter à l'application alàn.")
                ->action('Vérification de votre adresse e-mail', $url)
                ->line("Si vous n'avez pas créé de compte, aucune action supplémentaire n'est requise.");
        });

        //
    }
}
