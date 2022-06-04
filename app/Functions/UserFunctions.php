<?php
    namespace App\Functions;

    use App\Classes\User as ClassesUser;

    // use App\Classes\User as ClassesUser;
    use App\Models\User;
    use Illuminate\Http\Request;
    use App\Rules\email_exist;
    use App\Rules\login_val;

    class UserFunctions{
        public  $SIGNUP_RULE = [
            'name' => 'required|max:20',
            'email' => ['required','email:strict,dns,spoof','max:30'],
            'password' => 'required|alpha_dash|min:8|max:20'
        ];

        public  $SIGNUP_MESSAGE = [
            'name.required' => "名前を入力してください",
            'name.max' => "名前を２０文字以内入力してください",
            'email.required' => "メールアドレスを入力してください",
            'email.email' => "正しいメールアドレスの形式で入力してください",
            'email.max' => "メールアドレスを３０文字以内入力してください",
            'password.required' => "パスワードを入力してください",
            'password.alpha_dash' => "パスワードを入力半角英数字で入力してください",
            'password.min' => "パスワードを８文字以上２０文字以下で入力してください",
            'password.max' =>"パスワードを８文字以上２０文字以下で入力してください"
        ];

        public $LOGIN_RULE = [
            'form.email' => ['required','email:strict,dns,spoof','max:30'],
            'form.pass' => 'required|alpha_dash|min:8|max:20',
        ];

        public $LOGIN_MESSAGE = [
            'form.email.required' => "メールアドレスを入力してください",
            'form.email.email' => "正しいメールアドレスの形式で入力してください",
            'form.email.max' => "メールアドレスを３０文字以内入力してください",
            'form.pass.required' => "パスワードを入力してください",
            'form.pass.alpha_dash' => "パスワードを入力半角英数字で入力してください",
            'form.pass.min' => "パスワードを８文字以上２０文字以下で入力してください",
            'form.pass.max' =>"パスワードを８文字以上２０文字以下で入力してください"
        ];


        public function __construct()
        {
            $this->SIGNUP_RULE["email"][] = new email_exist();
            $this->LOGIN_RULE["form"] = new login_val(); 
        }

        public function insertUserToDB(&$request){
            $user_db = new User();
            $user_db->name = $request->name;
            $user_db->email = $request->email;
            $user_db->password = hash('ripemd160',$request->password);            
            $user_db->save();
        }

        public function login($email){
            // $name = User::where('email', '=', $email)->value('name');
            // $user = new ClassesUser();
            $user = new  ClassesUser();
            // session(['user'=>$email]);
            session(['user'=>serialize($user)]);
        }
        // public static function test(){
        //     return 1;
        // }
    }