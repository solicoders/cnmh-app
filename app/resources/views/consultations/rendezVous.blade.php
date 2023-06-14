@extends('layouts.app')
<style>
    .md-stepper-horizontal {
        display: table;
        width: 100%;
        margin: 0 auto;
        background-color: #FFFFFF;
        box-shadow: 0 3px 8px -6px rgba(0, 0, 0, .50);
    }

    .md-stepper-horizontal .md-step {
        display: table-cell;
        position: relative;
        padding: 24px;
    }

    .md-stepper-horizontal .md-step:hover,
    .md-stepper-horizontal .md-step:active {
        background-color: rgba(0, 0, 0, 0.04);
    }

    .md-stepper-horizontal .md-step:active {
        border-radius: 15% / 75%;
    }

    .md-stepper-horizontal .md-step:first-child:active {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .md-stepper-horizontal .md-step:last-child:active {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .md-stepper-horizontal .md-step:hover .md-step-circle {
        background-color: #757575;
    }

    .md-stepper-horizontal .md-step:first-child .md-step-bar-left,
    .md-stepper-horizontal .md-step:last-child .md-step-bar-right {
        display: none;
    }

    .md-stepper-horizontal .md-step .md-step-circle {
        width: 30px;
        height: 30px;
        margin: 0 auto;
        background-color: #999999;
        border-radius: 50%;
        text-align: center;
        line-height: 30px;
        font-size: 16px;
        font-weight: 600;
        color: #FFFFFF;
    }


    .md-stepper-horizontal.orange .md-step.active .md-step-circle {
        background-color: #0275d8;
    }


    /* .md-stepper-horizontal .md-step.done .md-step-circle:before {

        font-weight: 100;
        content: "\f00c";
    } */

    .md-stepper-horizontal .md-step.done .md-step-circle *,
    .md-stepper-horizontal .md-step.editable .md-step-circle * {
        display: block;
    }

    .md-stepper-horizontal .md-step.editable .md-step-circle {
        -moz-transform: scaleX(-1);
        -o-transform: scaleX(-1);
        -webkit-transform: scaleX(-1);
        transform: scaleX(-1);
    }

    .md-stepper-horizontal .md-step.editable .md-step-circle:before {
        /* font-family:'FontAwesome'; */
        font-weight: 100;
        content: "\f040";
    }

    .md-stepper-horizontal .md-step .md-step-title {
        margin-top: 16px;
        font-size: 16px;
        font-weight: 600;
    }

    .md-stepper-horizontal .md-step .md-step-title,
    .md-stepper-horizontal .md-step .md-step-optional {
        text-align: center;
        color: rgba(0, 0, 0, .26);
    }

    .md-stepper-horizontal .md-step.active .md-step-title {
        font-weight: 600;
        color: rgba(0, 0, 0, .87);
    }

    .md-stepper-horizontal .md-step.active.done .md-step-title,
    .md-stepper-horizontal .md-step.active.editable .md-step-title {
        font-weight: 600;
    }

    .md-stepper-horizontal .md-step .md-step-optional {
        font-size: 12px;
    }

    .md-stepper-horizontal .md-step.active .md-step-optional {
        color: rgba(0, 0, 0, .54);
    }

    .md-stepper-horizontal .md-step .md-step-bar-left,
    .md-stepper-horizontal .md-step .md-step-bar-right {
        position: absolute;
        top: 36px;
        height: 1px;
        border-top: 1px solid #DDDDDD;
    }

    .md-stepper-horizontal .md-step .md-step-bar-right {
        right: 0;
        left: 50%;
        margin-left: 20px;
    }

    .md-stepper-horizontal .md-step .md-step-bar-left {
        left: 0;
        right: 50%;
        margin-right: 20px;
    }
</style>
@section('content')
    <section class="content-header">


        <div class="container-fluid">

        </div>
    </section>


    <section class="content">
        <div class="container-fluid ">
            @include('flash::message')

            <div class="clearfix"></div>


            <div class="row">

                <div class="col-md-12">
                    <div class="card card-default">

                        <div class="md-stepper-horizontal orange">
                            <div class="md-step active done">
                                <div class="md-step-circle"><span>1</span></div>
                                <div class="md-step-title">Rendez-Vous</div>
                                <div class="md-step-bar-left"></div>
                                <div class="md-step-bar-right"></div>
                            </div>
                            <div class="md-step  done">
                                <div class="md-step-circle"><span>2</span></div>
                                <div class="md-step-title">Patient</div>
                                <div class="md-step-bar-left"></div>
                                <div class="md-step-bar-right"></div>
                            </div>
                            <div class="md-step ">
                                <div class="md-step-circle"><span>3</span></div>
                                <div class="md-step-title">Consultation</div>
                                <div class="md-step-bar-left"></div>
                                <div class="md-step-bar-right"></div>
                            </div>

                        </div>
                        <br>

                        <div class="card-body p-0">
                            <div class="table-responsive">

                                <form action="{{ route('consultations.patient', request()->model) }}" method="GET">

                                    <table class="table table-striped" id="tuteurs-table">
                                        <thead>
                                            <tr>

                                                <th></th>
                                                <th>N°d'Ordre</th>
                                                <th>N°Dossier</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Téléphone</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($dossier_patients as $dossier_patient)
                                                <tr>
                                                    <td>

                                                        <input required type="radio" value="{{ $dossier_patient->id }}"
                                                            name="dossier_patients"
                                                            aria-label="Radio button for following text input">
                                                    </td>

                                                    <td>{{ $dossier_patient->id }}</td>
                                                    <td>{{ $dossier_patient->numero_dossier }}</td>
                                                    <td>{{ $dossier_patient->nom }}</td>
                                                    <td>{{ $dossier_patient->prenom }}</td>
                                                    <td>{{ $dossier_patient->telephone }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>


                            </div>
                            <div class="ml-4 mb-3">
                                <a href="{{ route('consultations.index', request()->model) }} "
                                    class="btn btn-primary">Previous</a>
                                <div name="rendezVous" value="false" class="btn btn-primary">Ajouter sans RendezVous</div>
                                <button  class="btn btn-primary">next</button>
                            </div>
                            </form>
                            <div class="card-footer clearfix">
                                <div class="float-left">
                                    @include('adminlte-templates::common.paginate', [
                                        'records' => $dossier_patients,
                                    ])
                                </div>

                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.card -->



        </div>
    </section>
@endsection
