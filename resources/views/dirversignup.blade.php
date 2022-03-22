<body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;900&display=swap');



    body {
    margin: 0;
    /*width: 100vw;*/
    /* height: 120vh; */
    background: #ecf0f3;
    display: flex;
    align-items: center;
    text-align: center;
    justify-content: center;
    place-items: center;
    overflow: visible;
    font-family: poppins;
    }

    .container {
    position: relative;
    width: 350px;
    /*height: 500px;*/
    border-radius: 20px;
    padding: 40px;
    box-sizing: border-box;
    background: #ecf0f3;
    box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
    }

    .brand-logo {
    height: 100px;
    width: 100px;
    margin: auto;
    border-radius: 50%;
    box-sizing: border-box;
    box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white;
    }

    .brand-title {
    margin-top: 10px;
    font-weight: 900;
    font-size: 1.8rem;
    color: #1DA1F2;
    letter-spacing: 1px;
    }

    .inputs {
    text-align: left;
    margin-top: 30px;
    }

    label, input, button {
    display: block;
    width: 100%;
    padding: 0;
    border: none;
    outline: none;
    box-sizing: border-box;
    }

    label {
    margin-bottom: 4px;
    }

    label:nth-of-type(2) {
    margin-top: 12px;
    }

    input::placeholder {
    color: gray;
    }

    input {
    background: #ecf0f3;
    padding: 10px;
    padding-left: 20px;
    height: 50px;
    font-size: 14px;
    border-radius: 50px;
    box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px white;
    }

    button {
    color: white;
    margin-top: 20px;
    background: #1DA1F2;
    height: 40px;
    border-radius: 20px;
    cursor: pointer;
    font-weight: 900;
    box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
    transition: 0.5s;
    }

    button:hover {
    box-shadow: none;
    }

    /* a {
    position: absolute;
    font-size: 8px;
    bottom: 4px;
    right: 4px;
    text-decoration: none;
    color: black;
    background: yellow;
    border-radius: 10px;
    padding: 2px;
    } */

    h1 {
    position: absolute;
    top: 0;
    left: 0;
    }
    </style>


    <div class="container">
    <form action="{{route('driverrigester')}}" method="POST">
       @if (Session::get('success'))
            <div>{{session::get('success')}}</div>
       @endif
       @if (Session::get('fail'))
            <div>{{session::get('fail')}}</div>
       @endif
        @csrf
        <a href="/" style="text-decoration: none"><div class="brand-logo"><img src="{{ asset('img/application logo-01.png') }}" style="width: inherit" alt="Logo"></div></a>
        <div class="brand-title"><a href="/" style="text-decoration: none">TowTruck</a></div>
        <div class="inputs">
            <label>Name</label>
            <input type="text" placeholder="Your Name" name="name" value="{{old('name')}}"/>
            <label>PhoneNumber</label>
            <input type="text" placeholder="01********" name="phonenumber" value="{{old('phonenumber')}}"/>
            <span class="text-danger">@error('phonenumber'){{$message}}@enderror</span>
            <label>EMAIL</label>
            <input type="email" placeholder="example@test.com" name="email" value="{{old('email')}}"/>
            <span class="text-danger">@error('email'){{$message}}@enderror</span>
            <label>PASSWORD</label>
            <input type="password" placeholder="Min 6 charaters long" name="password" />
            <span class="text-danger">@error('password'){{$message}}@enderror</span>
            <label>National ID</label>
            <input type="text" placeholder="Your national id" name="ssn" value="{{old('ssn')}}"/>
            <span class="text-danger">@error('ssn'){{$message}}@enderror</span>
            <label>licenseplate number</label>
            <input type="text" placeholder="Your plate number" name="licenseplatenumber" value="{{old('licenseplatenumber')}}"/>
            <span class="text-danger">@error('licenseplatenumber'){{$message}}@enderror</span>
            <button type="submit">Signup</button>

        </div>
    </form>
    <a href="{{route('signup')}}" style="text-decoration: none"><button>Signup as a user</button></a>
    </div>
</body>
