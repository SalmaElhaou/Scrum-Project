<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\Personne; 
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    protected $email;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->email = Session::get('email');
            return $next($request);
        });
    }

    public function sendVerificationCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|'
        ]);

        $user = Personne::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('forgot')->with('message', 'Cette adresse e-mail n\'existe pas dans notre base de données.');
        }

        // Générer un code de vérification
        $verificationCode = rand(1000, 9999);

        // Enregistrer le code de vérification dans la base de données
        $user->verification_code = $verificationCode;
        $user->save();

        // Enregistrer l'email dans la variable de session
        Session::put('email', $user->email);

        // Envoi de l'e-mail de vérification
        try {
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'mohamedbouhaddou37@gmail.com';
            $mail->Password = 'igve sxot zjgn htco';
            $mail->SMTPSecure = 'ssl'; // Utilisez SSL
            $mail->Port = 465; // Port SMTP pour SSL

            $mail->setFrom('mohamedbouhaddou37@gmail.com', 'store');
            $mail->addAddress($user->email);

            $mail->isHTML(true);
            $mail->Subject = 'Verification code for password reset';
            $mail->Body = 'Your verification code is : ' . $verificationCode;

            $mail->send();
            return redirect('/saisir-code')->with('email', $user->email);
        } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    public function showVerificationForm()
    {
        return view('admin.ResetPassWord.VerificationCode');
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'code.*' => 'required|numeric|max:9|min:0', // Valider chaque élément du tableau code
        ]);
    
        $code = implode('', $request->code); // Convertir le tableau code en une seule chaîne
    
        $email = $request->email; // Récupérer l'email à partir de la variable de session initialisée dans le constructeur
        
        // Vérifier si l'email en session est valide
        if (!$email) {
            return redirect()->route('forgot')->with('message', 'Adresse e-mail non valide. Veuillez réessayer.');
        }
    
        // Récupérer l'utilisateur correspondant à l'email en session
        $user = Personne::where('email', $email)->first();
    
        if ($user && $user->verification_code == $code) {
            return redirect('/modifier-mot-de-passe')->with('email', $user->email);
        } else {
            return redirect()->route('forgot')->with('error', 'Code Vérification Incorrect.');
        }
    }
    
    public function showResetForm()
    {
        return view('Authentification.UpdatePassword');
    }
    
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required'
        ]);
    
        $user =Personne::where('email', $request->email)->first();
    
        if ($user) {
            // Réinitialiser le mot de passe
            $user->motDePasse = bcrypt($request->password);
            $user->save();
    
            return redirect('/formLogin')->with('success', 'Mot de passe réinitialisé avec succès. Veuillez vous connecter.');
        } else {
            return back()->withErrors(['email' => 'Adresse e-mail invalide']);
        }
    }
}
