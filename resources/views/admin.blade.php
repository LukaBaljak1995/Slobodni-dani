<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('head')
    </head>
    <body>
    <div class="container ">
        <div class="row">
           
            <div class="col-sm-6 offset-2" >
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Zaposleni</th>
                        <th scope="col">Tip ugovora</th>
                        <th scope="col">Datum od</th>
                        <th scope="col">Datum do</th>
                        <th scope="col">Broj dana iz prethodne godine</th>
                        <th scope="col">Broj dana iz tekuce godine</th>
                        <th scope="col">Odobreno</th>
                        <th scope="col">Odobri</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($zahteviKorisnika as $zahtevKorisnika)
                            <tr>
                                <th>{{ $zahtevKorisnika->ID }}</th>
                                <th>{{ $zahtevKorisnika->zaposleni->podaciOZaposlenom->ImePrezime }}</th>
                                <th>{{ $zahtevKorisnika->zaposleni->podaciOZaposlenom->tipUgovora->NazivTipaUgovora }}</th>
                                <th>{{ $zahtevKorisnika->DatumOd }}</th>
                                <th>{{ $zahtevKorisnika->DatumDo }}</th>
                                <th>{{ $zahtevKorisnika->zaposleni->podaciOZaposlenom->godisnjiOdmori[1]->BrojDana }}</th>
                                <th>{{ $zahtevKorisnika->zaposleni->podaciOZaposlenom->godisnjiOdmori[0]->BrojDana }}</th>
                                <td>{{ $zahtevKorisnika->Odobreno }}</td>
                                <td><a class="btn btn-primary" href="/SlobodniDani/laravel/odobriGodisnjiOdmor/{{ $zahtevKorisnika->ID }}" role="button">Odobri</a></td>
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
