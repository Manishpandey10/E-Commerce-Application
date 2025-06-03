{{-- Logout message --}}
@if (session('logoutMessage'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('logoutMessage') }}
    </div>
@endif
 {{-- after registering on the login page --}}
@if (session('registerSuccess'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('registerSuccess') }}
    </div>
@endif
{{-- loginpage error  --}}
@if (session('accessError'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('accessError') }}
    </div>
@endif
{{-- login page  --}}
@if (session('loginError'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('loginError') }}
    </div>
@endif
{{-- signup error --}}
@if (session('signupError'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('signupError') }}
    </div>
@endif
{{-- change password page error  --}}
@if (session('changePasswordError'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('changePasswordError') }}
    </div>
@endif
{{-- //for password change alert --}}
@if (session('changepasswordSuccess'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('changepasswordSuccess') }}
    </div>
@endif
@if (session('Error'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ session('Error') }}
    </div>
@endif
{{-- //for update profile message --}}
@if (session('updateMsg'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('updateMsg') }}
    </div>
@endif
{{-- adding a new product  --}}
@if (session('newProductAdded'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('newProductAdded') }}
    </div>
@endif
{{-- edit product --}}
@if (session('productupdated'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('productupdated') }}
    </div>
@endif
{{-- delete product  --}}
@if (session('deleted'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('deleted') }}
    </div>
@endif
{{-- NEw product category --}}
@if (session('productAdded'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('productAdded') }}
    </div>
@endif
{{-- updating product category --}}
@if (session('updateSuccess'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('updateSuccess') }}
    </div>
@endif
{{-- deleting the product category --}}
@if (session('productDeleted'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('productDeleted') }}
    </div>
@endif
{{-- Terms and policy alert message --}}
@if (session('updateExchangePolicy'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('updateExchangePolicy') }}
    </div>
@endif
@if (session('updatePrivacyPolicy'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('updatePrivacyPolicy') }}
    </div>
@endif
@if (session('termSuccess'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('termSuccess') }}
    </div>
@endif
{{-- Add color message --}}
@if (session('addedColor'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('addedColor') }}
    </div>
@endif
{{-- Editing color details  --}}
@if (session('colorEdit'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('colorEdit') }}
    </div>
@endif
{{-- Deleting color --}}
@if (session('colorDeleted'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('colorDeleted') }}
    </div>
@endif
{{-- Deleting theme --}}
@if (session('ThemeDeleted'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('ThemeDeleted') }}
    </div>
@endif
{{--  --}}
{{-- Editing theme   details  --}}
@if (session('updateTheme'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('updateTheme') }}
    </div>
@endif
{{-- Editing theme   details  --}}
@if (session('ThemeSucess'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('ThemeSucess') }}
    </div>
@endif
{{-- Jquery js script tag output  --}}
@if (session('BtnClick'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('BtnClick') }}
    </div>
@endif
