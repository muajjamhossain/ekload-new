<?php

use App\Library\SMTP;
use App\Library\Exception;
use App\Library\PHPMailer;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MailerController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecycleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SpecialityController;
use App\Http\Controllers\UddoktapayController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PageContentController;
use App\Http\Controllers\SelfProfileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\OrderPackageController;
use App\Http\Controllers\PaymentGatewayController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\NewsletterSubscribeController;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/clear-cache', function() {

    Artisan::call('cache:clear');
    \Artisan::call('route:clear');
    \Artisan::call('config:clear');
    \Artisan::call('view:clear');
    // \Artisan::call('config:cache');
    // \Artisan::call('optimize:clear');
    return redirect()->back();
});


// Route::get( 'pay', [UddoktapayController::class, 'show'] )->name( 'uddoktapay.payment-form' );
// Route::post( 'pay', [UddoktapayController::class, 'pay'] )->name( 'uddoktapay.pay' );
// Route::get( 'success', [UddoktapayController::class, 'success'] )->name( 'uddoktapay.success' );
// Route::get( 'cancel', [UddoktapayController::class, 'cancel'] )->name( 'uddoktapay.cancel' );

Route::get("/send-email", [MailerController::class, "composeEmail"])->name("send-email");


Route::group(['controller'=> WebsiteController::class], function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/sign-up', 'signup')->name('sign-up');
    Route::post('/sign-up', 'userSignup')->name('sign-up.store');
    Route::get('/user-profile', 'profile')->name('profile');
    Route::get('/update/user-profile', 'editProfile')->name('edit.user-profile');
    Route::post('/update/user-profile', 'updateProfile')->name('update.user-profile');
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('site_about');
    Route::get('/data/offer', 'data')->name('site_data');
    Route::get('/minute/offer', 'minute')->name('site_minute');
    Route::get('/combo/offer', 'combo')->name('site_combo');
    Route::get('/contact', 'contact')->name('site_contact');
    Route::get('/details/{slug}', 'details')->name('site_details');
    Route::get('/payment/{slug}', 'payment')->name('site_payment');
    Route::post('/contact/send', 'conMessage')->name('message_send');
    Route::post('/order/package/send', 'pacInfo')->name('order_package_info_send');
    Route::post('apply/coupon', 'applyCoupon')->name('applyCoupon');
    Route::post('/package/complete', 'pakInfoUpdate')->name('pac_info_update');
    Route::get( '/success', 'success')->name( 'pay.success' );
    Route::get( '/cancel', 'cancel' )->name( 'pay.cancel' );
    Route::get( '/ipn', 'ipn' )->name( 'pay.ipn' );





    Route::get('/mail', function(){


        $mail = new PHPMailer(true); // Passing true enables exceptions

        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'php1206724@gmail.com';
        $mail->Password = 'mttstsebqfvnfjkx';
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to



        $senderEmail = 'php1206724@gmail.com';
        $subject = 'Your Subject';

        $mail->setFrom($senderEmail);
        $mail->Subject = $subject;
        $mail->isHTML(true); // Set email format to HTML

        $recipients =  ['kan614760@gmail.com', 'zakircseiu@gmail.com', 'muajjam.imu@gmail.com'];

//         foreach ($recipients as $recipient) {
//             $to = $recipient;
//             $message = "Hello, $recipient! This is the content of the email."; // Customize the email content

//             $mail->addAddress($to);
//             $mail->Body = $message;

//             try {
//                 $mail->send();
//                 echo "Email sent to $to<br>";
//             } catch (Exception $e) {
//                 echo "Failed to send email to $to. Error: {$mail->ErrorInfo}<br>";
//             }

//             $mail->clearAddresses();
//         }



    });
});

Route::group(['prefix' => 'dashboard'], function () {

    Route::group(['prefix' => 'page', 'as' => 'page.', 'controller'=> HomeController::class], function () {
        Route::get('/home', 'index')->name('home');
    });

    Route::group(['prefix' => 'page', 'as' => 'page.', 'controller'=> PageController::class], function () {
        Route::get('', 'index')->name('');
    });

    Route::group(['prefix' => '/page', 'as' => 'page.', 'controller'=> PageContentController::class], function () {
        Route::get('/content', 'index')->name('');
        Route::get('/content/edit/{slug}', 'edit')->name('');
        Route::post('/content/update', 'update')->name('');
    });

    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'controller'=> SelfProfileController::class], function () {
        Route::get('', 'index')->name('');
    });

    Route::group(['prefix' => '/', 'as' => '.', 'controller'=> DashboardController::class], function () {
        Route::get('permission', 'permission')->name('');
        Route::get('/', 'index')->name('');
    });

    Route::group(['prefix' => 'newsletter', 'as' => 'newsletter.', 'controller'=> NewsletterSubscribeController::class], function () {
        Route::get('/subscribe', 'index')->name('');
    });

    Route::group(['prefix' => 'coupon', 'as' => 'coupon.', 'controller'=> CouponController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
    });

    Route::group(['prefix' => 'payment-gateway', 'as' => 'payment-gateway.', 'controller'=> PaymentGatewayController::class], function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::get('/delete/{id}', 'delete')->name('delete');
        Route::post('/publish', 'publish')->name('publish');
        Route::post('/unpublish', 'unpublish')->name('unpublish');
        Route::post('/softdelete', 'softdelete')->name('softdelete');
        Route::post('/restore', 'restore')->name('restore');
    });


    Route::group(['prefix' => 'package', 'as' => 'package.', 'controller'=> PackageController::class], function () {
        Route::get('/', 'index')->name('');
        Route::get('/my', 'my')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/publish', 'publish')->name('');
        Route::post('/unpublish', 'unpublish')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });


    Route::group(['prefix' => 'package/buy', 'as' => 'package-buy.', 'controller'=> OrderPackageController::class], function () {
        Route::get('/', 'index')->name('');
        Route::get('/unseen', 'unseen')->name('');
        Route::get('/view/{id}', 'view')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/publish', 'publish')->name('');
        Route::post('/unpublish', 'unpublish')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
        Route::get('/allprint', 'allprint')->name('');
        Route::get('/print/{id}', 'print')->name('');
        Route::get('/excel', 'export')->name('');
        Route::get('/pdf', 'pdf')->name('');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.', 'controller'=> UserController::class], function () {
        Route::get('/contact', 'contact')->name('contact');
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{user}', 'edit')->name('');
        Route::get('/view/{user}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'banner', 'as' => 'banner.', 'controller'=> BannerController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/publish', 'publish')->name('');
        Route::post('/unpublish', 'unpublish')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'manage', 'as' => 'manage.', 'controller'=> ManageController::class], function () {
        Route::get('/basic', 'basic')->name('');
        Route::post('/basic/update', 'update_basic')->name('');
        Route::get('/social', 'social_media')->name('');
        Route::post('/social/update', 'update_social_media')->name('');
        Route::get('/contact', 'contact')->name('');
        Route::post('/contact/update', 'update_contact')->name('');
        Route::get('/copyright', 'copyright')->name('');
        Route::post('/copyright/update', 'update_copyright')->name('');
    });


    Route::group(['prefix' => 'service', 'as' => 'service.', 'controller'=> ServiceController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });

    Route::group(['prefix' => 'team', 'as' => 'team.', 'controller'=> TeamController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/add', 'add')->name('');
        Route::get('/edit/{slug}', 'edit')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/submit', 'insert')->name('');
        Route::post('/update', 'update')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
    });


// Route::group(['prefix' => 'user', 'as' => 'user.', 'controller'=> UserController::class], function () {});

    Route::group(['prefix' => 'contactus', 'as' => 'contactus.', 'controller'=> ContactUsController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/view/{slug}', 'view')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/softdelete', 'softdelete')->name('');
        Route::post('/restore', 'restore')->name('');
        Route::post('/delete', 'delete')->name('');
        Route::get('/allprint', 'allprint')->name('');
        Route::get('/print/{slug}', 'print')->name('');
        Route::get('/excel', 'export')->name('');
        Route::get('/pdf', 'pdf')->name('');
        Route::get('/notification', 'notification')->name('');
    });

    Route::group(['prefix' => 'recycle', 'as' => 'recycle.', 'controller'=> RecycleController::class], function () {
        Route::get('', 'index')->name('');
        Route::get('/user', 'user')->name('');
        Route::get('/banner', 'banner')->name('');
        Route::get('/contactus', 'contactus')->name('');
        Route::get('/appointment', 'appointment')->name('');
        Route::get('/doctor', 'doctor')->name('');
        Route::get('/service', 'service')->name('');
        Route::get('/video', 'video')->name('');
        Route::get('/event', 'event')->name('');
        Route::get('/team', 'team')->name('');
        Route::get('/partner', 'partner')->name('');
        Route::get('/client', 'client')->name('');
        Route::get('/gallery', 'gallery')->name('');
        Route::get('/gallery/category', 'gallery_category')->name('');
        Route::get('/testimonial', 'testimonial')->name('');
        Route::get('/faq', 'faq')->name('');
        Route::get('/blog/post', 'post')->name('');
        Route::get('/blog/category', 'blog_category')->name('');
        Route::get('/blog/tag', 'tag')->name('');
    });


});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
