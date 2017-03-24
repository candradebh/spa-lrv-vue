<li><a class="black-text" href="{{url('website')}}">Home</a> </li>
<li><a class="black-text" href="{{url('website/services')}}">Services</a></li>
<li><a class="black-text" href="{{url('website/products')}}">Products</a></li>
<li><a class="black-text" href="{{url('website/contacts')}}">Contact</a></li>


<!-- Authentication Links -->
@if(Sentinel::check())
    <li>
        <a class="dropdown-button" href="#!" data-activates="dropdown-user">
            {{ Sentinel::getUser()->first_name }}
            <i class="material-icons right">arrow_drop_down</i>
        </a>
        <ul id="dropdown-user" class="dropdown-content">
            <li>
                <a href="#"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{url('login/out')}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </li>
@else
    <li><a class="black-text" href="{{ url('login') }}">Login</a></li>
    <li><a class="black-text" href="{{ url('register') }}">Register</a></li>
@endif