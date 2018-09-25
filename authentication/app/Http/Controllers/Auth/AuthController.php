public function login(Request $request) {
        if (Auth::attempt ( array (
                'username' => $request->get ( 'login-username' ),
                'password' => $request->get ( 'login-password' ) 
        ) )) {
            session ( [ 
                    'username' => $request->get ( 'login-username' ) 
            ] );
            return Redirect::back ();
        } else {
            Session::flash ( 'message-login', "Invalid Username or Password , Please try again." );
            return Redirect::back ();
        }
    }

    public function logout() {
        Session::flush ();
        Auth::logout ();
        return Redirect::back ();
    }