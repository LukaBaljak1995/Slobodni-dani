<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('head')
    </head>
    <body>
    <div class="container ">
        <div class="row">
            <div class="col-sm-3 " >
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

            <div class="col-sm-6 offset-2" >
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Datum od</th>
                        <th scope="col">Datum do</th>
                        <th scope="col">Odobreno</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zahteviKorisnika as $zahtevKorisnika)
                            <tr>
                                <th>{{ $zahtevKorisnika->ID }}</th>
                                <th>{{ $zahtevKorisnika->DatumOd }}</th>
                                <td>{{ $zahtevKorisnika->DatumDo }}</td>
                                <td>{{ $zahtevKorisnika->Odobreno }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
        @include('scripts')
    </body>
</html>
