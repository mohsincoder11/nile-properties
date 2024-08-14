<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\Option;
use App\Models\Quiz;
use App\Models\QuizIndiyatra;
use App\Models\User;
use App\Models\About;
use App\Models\Flipbook;
use App\Models\CompetitionModel;
use App\Models\Heroes;
use App\Models\Slider;
use App\Models\Stories;
use App\Models\ArtModel;
use App\Models\Feedback;
use App\Models\Question;
use App\Models\ContactUs;
use App\Models\PrintColor;
use App\Models\WriteForUs;
use App\Models\SocialLinks;
use App\Models\SportsModel;
use App\Models\UserAnswers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Collaborators;
use Illuminate\Support\Facades\DB;
use App\Models\FoodAndCultureModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class WebsciteController extends Controller
{

    public function userLoginCheck(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.indexGet');
        }

        return redirect()->back()->with('error', 'Invalid email or password');
    }

    public function indexGet()
    {
        $Stories = Stories::latest()->take(6)->get();
        // dd(count($Stories));

        $social_data = SocialLinks::first();
        $about_data = About::first();
        $sliders = Slider::all();
        // echo "$sliders";

        $PrintColor = PrintColor::orderBy('created_at', 'desc')->get();

        return view('webscite.index', compact('about_data', 'sliders', 'PrintColor', 'social_data', 'Stories'));
    }
    public function storiesGet()
    {
        $Stories = Stories::orderBy('created_at', 'desc')->get();
        $social_data = SocialLinks::first();
        return view('webscite.stories', compact('social_data', 'Stories'));
    }

    public function Displaystories(Request $request)
    {
        // $Stories = Stories::all();
        $social_data = SocialLinks::first();

        $Stories = stories::where('id', $request->id)->first();
        return view('webscite.storiesdisplay', compact('Stories', 'social_data'));
    }
    public function Thankyou()
    {

        $social_data = SocialLinks::first();
        return view('webscite.Thankyou', compact('social_data'));
    }
    public function ConformPassword()
    {

        $social_data = SocialLinks::first();
        return view('webscite.conform_password', compact('social_data'));
    }
    public function disclaimer1Get()
    {
        $social_data = SocialLinks::first();
        return view('webscite.disclaimer1', compact('social_data'));
    }
    public function disclaimer2Get()
    {
        $social_data = SocialLinks::first();
        return view('webscite.disclaimer2', compact('social_data'));
    }
    public function otpGet(Request $request)
    {
        $user_id = Crypt::decrypt($request->encryptedUserId);

        $encryptedUserId = User::first();
        $social_data = SocialLinks::first();
        return view('webscite.otp', compact('social_data', 'user_id'));
    }

    public function LogoutGet()
    {
        Auth::logout();

        return redirect('loginGet');

    }


    public function story1Get()
    {
        $social_data = SocialLinks::first();
        return view('webscite.story_1', compact('social_data'));
    }
    public function story2Get()
    {
        $social_data = SocialLinks::first();
        return view('webscite.story_2', compact('social_data'));
    }
    public function story3Get()
    {
        $social_data = SocialLinks::first();
        return view('webscite.story_3', compact('social_data'));
    }
    public function story4Get()
    {
        $social_data = SocialLinks::first();
        return view('webscite.story_4', compact('social_data'));
    }
    public function story5Get()
    {
        $social_data = SocialLinks::first();
        return view('webscite.story_5', compact('social_data'));
    }

    public function story_2Get()
    {
        $social_data = SocialLinks::first();
        return view('webscite.story2', compact('social_data'));
    }

    public function heroesLeaderGet()
    {
        $social_data = SocialLinks::first();
        $Heroes = Heroes::orderBy('created_at', 'desc')->get();

        return view('webscite.heroes-leader', compact('social_data', 'Heroes'));
    }
    public function foodAndCultureGet()
    {
        $social_data = SocialLinks::first();
        return view('webscite.index', compact('social_data'));
    }

    public function sportsGet()
    {
        $social_data = SocialLinks::first();
        return view('webscite.index', compact('social_data'));
    }
    public function artGet()
    {
        $social_data = SocialLinks::first();
        return view('webscite.index', compact('social_data'));
    }
    public function newsLettersGet()
    {
        $social_data = SocialLinks::first();
        return view('webscite.index', compact('social_data'));
    }


    public function loginGet()
    {
        $social_data = SocialLinks::first();
        return view('webscite.login', compact('social_data'));
    }
    public function disclaimerGet()
    {
        $social_data = SocialLinks::first();
        return view('webscite.disclaimer', compact('social_data'));
    }
    public function contactUsGet()
    {
        $social_data = SocialLinks::first();
        return view('webscite.contact-us', compact('social_data'));
    }
    public function collaboratorsGet()
    {
        $Collaborators = Collaborators::orderBy('created_at', 'desc')->get();
        $social_data = SocialLinks::first();
        return view('webscite.collaborators', compact('social_data', 'Collaborators'));
    }
    public function meetsGet()
    {
        $social_data = SocialLinks::first();
        $Meet = Meet::orderBy('created_at', 'desc')->get();

        return view('webscite.meets', compact('social_data', 'Meet'));
    }
    public function forgetPasswordGet()
    {
        $social_data = SocialLinks::first();
        return view('webscite.forget-password', compact('social_data'));
    }
    public function registrationGet()
    {
        $user = SocialLinks::first();
        $social_data = SocialLinks::first();
        return view('webscite.registration', compact('social_data', 'user'));
    }
    public function writeForUsGet()
    {
        $social_data = SocialLinks::first();
        return view('webscite.write-for-us', compact('social_data'));
    }
    //write for us store
    public function WriteForUsPost(Request $request)
    {
        $request->validate([
            // Add your validation rules here
        ]);

        $writeForUs = new WriteForUs();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $writeForUs->image = $filename;
        }

        $writeForUs->username = $request->username;
        $writeForUs->email = $request->email;
        $writeForUs->number = $request->number;
        $writeForUs->message = $request->message;

        $writeForUs->save();

        return redirect('Thankyou');
    }

    public function contactUsPost(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'nullable|string|max:10',
            'message' => 'required|string',
        ]);


        ContactUs::create([
            'username' => $request->username,
            'email' => $request->email,
            'number' => $request->number,
            'message' => $request->message,

        ]);

        return redirect('Thankyou');
    }

    //delete contactus
    public function deleteContactUs($id)
    {
        // dd(1);
        $contactUsEntry = ContactUs::find($id);
        // dd($contactUsEntry);

        if (!$contactUsEntry) {
            return redirect()->back()->with('error', 'Contact form entry not found.');
        }


        $contactUsEntry->delete();

        // $demo = Demo::where('id', $request->id)->delete();

        return redirect()->back()->with('success1', 'Form entry deleted successfully');
    }

    public function deletewriteForUs($id)
    {

        $deletewriteForUs = WriteForUs::find($id);

        if (!$deletewriteForUs) {
            return redirect()->back()->with('error', 'Form entry not found.');
        }

        $deletewriteForUs->delete();

        return redirect()->back()->with('success1', 'Form entry deleted successfully.');
    }


    public function WebsiteUserRegistration(Request $request)
    {
        $otp = rand(100000, 999999);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'number' => 'nullable|string|max:20',
        ]);

        try {
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'number' => $validatedData['number'],
                'password' => bcrypt($request->password),
                'otp' => $otp,
            ]);

            // Encrypt the user ID before sending it to the view or any other place
            $encryptedUserId = encrypt($user->id);

            Mail::send('frontend.confirmation_mail', [
                'name' => $validatedData['name'],
                'otp' => $otp,
            ], function ($message) use ($validatedData) {
                $message->to($validatedData['email'], $validatedData['name'])->subject('Confirmation OTP');
                $message->from('bharatiyastories2024@gmail.com', 'Bharatiya Stories.');
            });

            return redirect()->route('user.otpGet', compact('encryptedUserId'));
        } catch (\Illuminate\Database\QueryException $exception) {
            if ($exception->errorInfo[1] == 1062) {
                return back()->with(['email' => 'This email is already registered.']);
            } else {
                return back()->withErrors(['error' => 'An error occurred while processing your request.']);
            }
        }
    }



    public function verifyRegistrationOtp(Request $request)
    {
        try {
            $user = User::findOrFail($request->user_id);

            // Concatenate otp1 to otp6
            $enteredOTP = $request->otp1 . $request->otp2 .
                $request->otp3 . $request->otp4 .
                $request->otp5 . $request->otp6;

            if ($user->otp == $enteredOTP) {
                Auth::login($user);
                return redirect()->route('user.indexGet')->with('status', 'Welcome, ' . $user->name . '!');
            } else {
                return back()->withErrors(['otp' => 'Invalid OTP.']);
            }
        } catch (\Illuminate\Contracts\Encryption\DecryptException | \Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
            return back()->withErrors(['user_id' => 'Invalid user ID.']);
        }
    }




    public function ForgetPasswordVerify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);


        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email not found.');
        }


        $otp = mt_rand(100000, 999999);


        $rememberToken = Str::random(60);

        $user->update([
            'otp' => $otp,
            'remember_token' => $rememberToken,
        ]);


        Mail::send('webscite.otpmail', [
            'email' => $request->input('email'),
            'name' => $user->name,
            'otp' => $otp,
        ], function ($message) use ($request) {
            $message->to($request->input('email'))->subject('Confirmation OTP');
            $message->from('bharatiyastories2024@gmail.com', 'Bhartiya Story.');
        });

        return redirect()->route('user.ForgetPasswordOtpPage', [

            'remember_token' => $rememberToken,
        ]);
    }



    public function ForgetPasswordOtpPage(Request $request)
    {
        $rememberToken = $request->input('remember_token');
        $social_data = SocialLinks::first();
        return view('webscite.forgetotp1', compact('social_data', 'rememberToken'));
    }

    public function ForgetPasswordUpdatePage(Request $request)
    {
        $request->validate([
            'otp1' => 'required|numeric|digits:1',
            'otp2' => 'required|numeric|digits:1',
            'otp3' => 'required|numeric|digits:1',
            'otp4' => 'required|numeric|digits:1',
            'otp5' => 'required|numeric|digits:1',
            'otp6' => 'required|numeric|digits:1',
            'remember_token' => 'required',
        ]);

        // Concatenate the otp1 to otp6 values
        $enteredOTP = $request->input('otp1') . $request->input('otp2') .
            $request->input('otp3') . $request->input('otp4') .
            $request->input('otp5') . $request->input('otp6');

        $rememberToken = $request->input('remember_token');

        $user = User::where('otp', $enteredOTP)
            ->where('remember_token', $rememberToken)
            ->first();

        if ($user) {
            return redirect()->route('user.ForgetPasswordUpdateStore', [
                'remember_token' => $rememberToken,
            ]);
        } else {
            return redirect()->back()->with('error', 'Invalid OTP. Please try again.');
        }
    }



    public function ForgetPasswordUpdateStorepage(Request $request)
    {
        // Retrieve the remember_token from the request
        $rememberToken = $request->input('remember_token');

        $social_data = SocialLinks::first();

        return view('webscite.forgetpasswordupdate', compact('social_data', 'rememberToken'));
    }


    public function updatepassword(Request $request)
    {
        // Validate the form data
        $request->validate([

        ]);

        $user = User::where('remember_token', $request->input('remember_token'))->first();

        if ($user) {
            // Update the password using Hash::make
            $user->update(['password' => Hash::make($request->input('newpassword'))]);

            // Redirect to the dashboard with the username
            return redirect()->route('user.indexGet')->with('success', 'Password updated successfully. Welcome, ' . $user->name . '!');
        } else {
            return redirect()->back()->with('error', 'Invalid Password or Token. Please try again.');
        }
    }
    public function feedbackValue(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'message' => 'required',
        ]);

        // Get the authenticated user's ID
        $userId = auth()->user()->id;

        // Get the 'happysad_hidden_value' from the request or set a default value
        $happySadValue = $request->input('happysad_hidden_value', 'default_value');

        Feedback::create([
            'user_id' => $userId,
            'message' => $request->message,
            'happysad_hidden_value' => $happySadValue,
        ]);

        return redirect()->back()->with('success1', 'Feedback submitted successfully');
    }

    //food culture

    public function foodCultureWebsite()
    {
        $foodandculture = FoodAndCultureModel::orderBy('created_at', 'desc')->get();

        $social_data = SocialLinks::first();
        return view('webscite.food_culture_webscite', compact('social_data', 'foodandculture'));
    }
    public function foodCultureWebsite1($id)
    {
        $foodandculture = FoodAndCultureModel::find($id);
        $social_data = SocialLinks::first();
        return view('webscite.food_culture_webscite1', compact('social_data', 'foodandculture'));
    }


    public function artsWebsite()
    {
        $art = ArtModel::all();
        $social_data = SocialLinks::first();
        return view('webscite.arts_webscite', compact('social_data', 'art'));
    }
    public function artsWebsite1($id)
    {
        $art = ArtModel::find($id);
        $social_data = SocialLinks::first();
        return view('webscite.arts_webscite1', compact('social_data', 'art'));
    }


    public function sportsWebsite()
    {
        $sport = SportsModel::all();
        $social_data = SocialLinks::first();
        return view('webscite.sports_webscite', compact('social_data', 'sport'));
    }
    public function sportsWebsite1($id)
    {
        $sport = SportsModel::find($id);
        $social_data = SocialLinks::first();
        return view('webscite.sports_webscite1', compact('social_data', 'sport'));
    }




    public function heroesLeaderWebsite1(Request $request)
    {
        $heroes = Heroes::where('id', $request->id)->first();
        $social_data = SocialLinks::first();
        return view('webscite.heroes_leader_webscite1', compact('social_data', 'heroes'));
    }

    public function comingsoon()
    {
        $social_data = SocialLinks::first();

        return view('webscite.comming_soon', compact('social_data'));
    }


    public function quizqueans()
    {
        $social_data = SocialLinks::first();

        return view('webscite.quiz_question_answer', compact('social_data'));
    }



    public function quizGet()
    {
        $quiz = Quiz::orderBy('created_at', 'desc')->get();
        $question = Question::first();
        $social_data = SocialLinks::first();
        return view('webscite.quiz', compact('social_data', 'quiz', 'question'));
    }




    public function startQuiz($quizid, $queid)
    {
        $social_data = SocialLinks::first();
        $quiz = Quiz::findOrFail($quizid);

        $question = Question::where('id', $queid)->first();
        $correctOptionId = $question->options->where('is_right', 1)->first()->id;

        $questionIndex = $quiz->questions->pluck('id')->search($queid);


        return view('webscite.quiz_question_answer', compact('quiz', 'social_data', 'question', 'questionIndex', 'correctOptionId'));
    }


    public function quizmediater($quizid)
    {

        $question = Question::where('quiz_id', $quizid)->orderBy('id', 'asc')->first();


        return redirect()->route('user.startQuiz', ['quizId' => $quizid, 'quesId' => $question->id]);

    }






    public function UserResult()
    {
        $social_data = SocialLinks::first();

        return view('webscite.user_result', compact('social_data'));
    }

    public function submitQuizForm(Request $request)
    {
        // dd($request->all());
        $quizId = $request->input('quiz_id');
        $currentQuestionId = $request->input('question_id');


        $userId = Auth::id();


        $quiz = Quiz::findOrFail($quizId);
        $nextQuestion = Question::where('id', '>', $currentQuestionId)
            ->where('quiz_id', '=', $quizId)
            ->orderBy('id', 'asc')
            ->first();


        $userAnswer = UserAnswers::UpdateOrCreate(
            [
                'user_id' => $userId,
                'question_id' => $currentQuestionId,
                'quiz_id' => $quizId,
            ],
            [
                'user_id' => $userId,
                'question_id' => $currentQuestionId,
                'option_id' => $request->input('option'),
                'quiz_id' => $quizId,
            ]
        );
        $userAnswer->save();
        // dd($userAnswer);


        if (!$nextQuestion) {

            $quizQuestions = $quiz->questions;
            $correct_ids = [];
            $userSelectedOptionId = UserAnswers::
                where([
                    'user_id' => $userId,
                    'quiz_id' => $quizId
                ])
                ->get()->pluck('option_id')->toArray();
            foreach ($quizQuestions as $question) {
                $correct_ids[] = $question->options->where('is_right', 1)->first()->id;
            }


            $correctAnswers = count(collect($correct_ids)->intersect($userSelectedOptionId)->toArray());

            $incorrectAnswers = count($correct_ids) - $correctAnswers;

            $social_data = SocialLinks::first();


            return view('webscite.user_result', compact('correctAnswers', 'incorrectAnswers', 'quizId', 'social_data', 'quiz'));
        }


        return redirect()->route('user.startQuiz', ['quizId' => $quizId, 'quesId' => $nextQuestion->id]);
    }


    //quiz indiytra

    public function quizIndiyatraGet()
    {
        $quiz = QuizIndiyatra::orderBy('created_at', 'desc')->get();
        // $question = Question::first();
        $social_data = SocialLinks::first();
        return view('webscite.quiz_indiyatra_website', compact('social_data', 'quiz'));
    }

    public function flipbookGet()
    {
        $quiz = Flipbook::orderBy('created_at', 'desc')->get();
        // $question = Question::first();
        $social_data = SocialLinks::first();
        return view('webscite.flipbook_website', compact('social_data', 'quiz'));
    }


    public function CompetitionGet()
    {
        $social_data = SocialLinks::first();
        $Competition = CompetitionModel::orderBy('created_at', 'desc')->get();
        return view('webscite.Competition_webscite', compact('Competition', 'social_data'));
    }


    public function CompetitionDetails($id)
    {
        $CompetitionDetails = CompetitionModel::find($id);
        $social_data = SocialLinks::first();
        return view('webscite.Competition_webscite1', compact('social_data', 'CompetitionDetails'));
    }


}
