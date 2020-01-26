<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('head')
    </head>
    <body>
        <div class="row">
            <div class="col-sm-3 col-sm-offset-3" style="margin:auto">
                <form action="/SlobodniDani/laravel/zaposleniZahtevZaOdmorom" method="post">
                {{ csrf_field() }}
                    <input type="text" name="korisnikID" id="" value = " {{ $korisnikID }} " hidden>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Datum od</label>
                        <input type="date" class="form-control" name="datumOd" aria-describedby="emailHelp" placeholder="Unesite kad odmor pocinje.">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Datum do</label>
                        <input type="date" class="form-control" name="datumDo" placeholder="Unesite kad se odmor zavrsava.">
                    </div>
                    <button type="submit" class="btn btn-primary">Predaj zahtev</button>
                </form>
            </div>
        </div>

        @include('scripts')
    </body>
</html>
