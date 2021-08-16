<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  @livewireStyles
</head>
<body>
	<div class="text-center flex justify-center pt-5">
		<div class="w-1/3 border border-gray-400 rounded py-4">
			@yield('content')

		</div>
	</div>
	<div class="text-center flex justify-center">
		<a class="m-5 py-2 px-2 bg-green-400 cursor-pointer border rounded text-white" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
	</div>
  @livewireScripts
</body>
</html>