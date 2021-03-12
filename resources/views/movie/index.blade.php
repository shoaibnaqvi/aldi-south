@extends('layouts.main')
@section('content')
    <!-- Main content -->
    <section class="content col-lg-12" id="movies-app">
        <!-- Main row -->
        <div class="row">
            <movies-list></movies-list>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
@push('scripts')
    <script src="{{ asset('js/components/movies.js') }}"></script>
@endpush
