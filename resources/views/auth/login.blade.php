<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Страница авторизации</title>
	@vite(['resources/sass/app.scss'])
</head>
<body>
	<main class="wrap-auth">
        <div class="auth">
            <div class="auth__img">
                <img src="/images/auth.jpeg" alt="Авторизация БИФК | Расписание" />
            </div>
            <div class="auth__form">
                <h3 class="auth__title">Авторизация</h3>
                <form action="/login" method="post">
					@csrf
                    <div class="input-wrap">
                        <input type="email" name="email" id="email" class="auth__input" autocomplete="off"
                            placeholder="Email" v-model="this.form.email" required />
                        <label class="auth__label" for="email">Email:</label>
                        <div class="auth__icon">
                            <svg enable-background="new 0 0 100 100" version="1.1" viewBox="0 0 100 100"
                                xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
                                <g transform="translate(0 -952.36)">
                                    <path
                                        d="m17.5 977c-1.3 0-2.4 1.1-2.4 2.4v45.9c0 1.3 1.1 2.4 2.4 2.4h64.9c1.3 0 2.4-1.1 2.4-2.4v-45.9c0-1.3-1.1-2.4-2.4-2.4h-64.9zm2.4 4.8h60.2v1.2l-30.1 22-30.1-22v-1.2zm0 7l28.7 21c0.8 0.6 2 0.6 2.8 0l28.7-21v34.1h-60.2v-34.1z">
                                    </path>
                                </g>
                                <rect class="st0" width="100" height="100"></rect>
                            </svg>
                        </div>
                    </div>
                    <div class="input-wrap">
                        <input type="password" name="password" id="password" class="auth__input" autocomplete="off"
                            placeholder="Пароль" v-model="this.form.password" required />
                        <label class="auth__label" for="password">Пароль:</label>
                        <div class="auth__icon">
                            <svg enable-background="new 0 0 24 24" version="1.1" viewBox="0 0 24 24" xml:space="preserve"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect class="st0" width="24" height="24"></rect>
                                <path class="st1" d="M19,21H5V9h14V21z M6,20h12V10H6V20z"></path>
                                <path class="st1"
                                    d="M16.5,10h-1V7c0-1.9-1.6-3.5-3.5-3.5S8.5,5.1,8.5,7v3h-1V7c0-2.5,2-4.5,4.5-4.5s4.5,2,4.5,4.5V10z">
                                </path>
                                <path class="st1"
                                    d="m12 16.5c-0.8 0-1.5-0.7-1.5-1.5s0.7-1.5 1.5-1.5 1.5 0.7 1.5 1.5-0.7 1.5-1.5 1.5zm0-2c-0.3 0-0.5 0.2-0.5 0.5s0.2 0.5 0.5 0.5 0.5-0.2 0.5-0.5-0.2-0.5-0.5-0.5z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    
					@if ($errors->any())
						<ul class="auth__errors">
							@foreach ($errors->all() as $error)
								<li> {{ $error }}</li>
							@endforeach
						</ul>
					@endif
                    <button type=" submit" class="auth__btn">Войти</button>
                </form>
            </div>
        </div>
    </main>
	
</body>
</html>
