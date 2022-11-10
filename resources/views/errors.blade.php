<link rel="stylesheet" href="stylesheets/errors.css">
@if ($errors->any())
<p>
    <u>{{ $errors->first() }}</u>
</p>
@endif
