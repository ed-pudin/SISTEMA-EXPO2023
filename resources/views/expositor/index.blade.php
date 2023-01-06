@extends('expositor.struct')

@section('Content')


<div class="col-sm p-3 min-vh-80">
    <div class="container-fluid" style="height:80vh">
        <div class="row" style="justify-content: center; height: 80vh">
            <div class="card mb-3 d-none d-lg-block d-xl-block d-md-block bg-dark" style="width: 80%; height: 80vh;">
                <div class="card-body">
                    <h5 class="card-title sm-bg text-center" style="color:#fcfcfc;font-size: 2rem">Código QR</h5>
                        <div class="" style="margin-bottom:20px">
                            <div class="container" style="display: flex; font-size:1.5rem">
                                <p style="flex-grow: 1; margin-bottom: 0px;">
                                    <b>Nombre estudiante</b>
                                </p>
                                <p>
                                    <b>Matricula</b>
                                </p>
                            </div>
                            <div class="container" style="display: flex;">
                                <h4 style="flex-grow: 1">Edna Alexandra Lecea Contreras</h4>
                                <h4>1853806</h4>
                            </div>
                        </div>
                        <div class="col-12 d-md-flex justify-content-center align-items-center" style="margin-bottom:20px">
                            <hr class="colorfull col-md-11">
                        </div>
                        <div class="container"  style="display: flex; justify-content:center">
                            <!--<svg xmlns="http://www.w3.org/2000/svg" width="70%" height="500px" fill="white" class="bi bi-qr-code" viewBox="0 0 16 16">
                                <path d="M2 2h2v2H2V2Z"/>
                                <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"/>
                                <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"/>
                                <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"/>
                                <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"/>
                            </svg>-->
                            <img id='barcode'
                                width="30%" height="30%"
                                src="https://api.qrserver.com/v1/create-qr-code/?data=1853806" 
                                alt=""/>
                        </div>

                        <div class="container text-center mt-5" hidden>
                            <a href="https://example.com">Networking</a>
                        </div>
                </div>
            </div>

            <div class="d-sm-block d-lg-none d-xl-none d-md-none" style="background-color: black;">
                <h5 class="card-title text-center" style="font-size: 2rem; margin-bottom:20px; margin-top:20px">Código QR</h5>
                <div class="container text-center" style="display: block; font-size:1.5rem; margin-bottom:40px">
                    <div>
                        <p>
                            <b>Nombre estudiante</b>
                            <p style="flex-grow: 1">Edna Alexandra Lecea Contreras</p>
                        </p>
                        <p>
                            <b>Matricula</b>
                            <p>1853806</p>
                        </p>
                    </div>
                    <!--<svg xmlns="http://www.w3.org/2000/svg" fill="white" class="bi bi-qr-code" viewBox="0 0 16 16">
                        <path d="M2 2h2v2H2V2Z"/>
                        <path d="M6 0v6H0V0h6ZM5 1H1v4h4V1ZM4 12H2v2h2v-2Z"/>
                        <path d="M6 10v6H0v-6h6Zm-5 1v4h4v-4H1Zm11-9h2v2h-2V2Z"/>
                        <path d="M10 0v6h6V0h-6Zm5 1v4h-4V1h4ZM8 1V0h1v2H8v2H7V1h1Zm0 5V4h1v2H8ZM6 8V7h1V6h1v2h1V7h5v1h-4v1H7V8H6Zm0 0v1H2V8H1v1H0V7h3v1h3Zm10 1h-1V7h1v2Zm-1 0h-1v2h2v-1h-1V9Zm-4 0h2v1h-1v1h-1V9Zm2 3v-1h-1v1h-1v1H9v1h3v-2h1Zm0 0h3v1h-2v1h-1v-2Zm-4-1v1h1v-2H7v1h2Z"/>
                        <path d="M7 12h1v3h4v1H7v-4Zm9 2v2h-3v-1h2v-1h1Z"/>
                      </svg>-->
                      <img id='barcode'
                        src="https://api.qrserver.com/v1/create-qr-code/?data=1853806" 
                        alt=""/>

                      <div class="container text-center mt-5" hidden>
                        <a href="https://example.com">Networking</a>
                    </div>
                </div>

        </div>
    </div>
</div>

@endsection
