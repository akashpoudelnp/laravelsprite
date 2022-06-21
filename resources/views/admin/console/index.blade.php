@extends('admin.layouts.master')
@section('title', 'Admin | Laravel Sprite')
@section('heading', 'Admin Panel')
@section('sub_heading', 'Artisan Console')
@push('css')
    <style>
        #console {
            height: calc(100vh - 400px);
            overflow-y: auto;
            border: 2px solid #4683fdc6;
            border-radius: 4px;
            padding: 10px;
            /* monospace font */
            font: 14px "Consolas", monospace !important;
        }
    </style>
@endpush
@section('content')

    {{-- Command Console --}}
    <div class="d-flex flex-column">
        <div id="consolebody" class="text-primary p-3 d-flex flex-column">
            <pre id="console"></pre>
        </div>
        <div id="loading" style="display: none;" class="progress">
            <div class="progress-bar progress-bar-indeterminate bg-primary"></div>
        </div>
        <form id="execute" class="d-flex" action="{{ route('admin.console.execute') }}" method="post">
            @csrf
            <div class="input-group mb-2">
                <span class="input-group-text">
                    <b class="text-primary px-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-terminal-2" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <desc>Download more icon variants from https://tabler-icons.io/i/terminal-2</desc>
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M8 9l3 3l-3 3"></path>
                            <line x1="13" y1="15" x2="16" y2="15"></line>
                            <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                        </svg>
                    </b>
                    php artisan
                </span>
                <input type="text" class="form-control" name="command" placeholder="command" autocomplete="off">
            </div>
        </form>

    </div>

@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $("#console").append('> Behold the WebArtisan v1.0 Mr. <b>{{ auth()->user()->name }}</b>\n\n');
            $("#console").append('> Type <b>list</b> to view all commands \n\n');
        });
        $("#execute").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var current_command = form.find('input[name="command"]').val();
            switch (current_command) {
                case 'clear':
                    $("#console").html('');
                    form.trigger('reset');
                    return false;
                    break;
                case 'ls':
                    $("#console").append('> Cannot list directory here.\n\n');
                    form.trigger('reset');
                    return false;
                    break;
                case 'akash':
                    $("#console").append('> Hi there Akash.\n\n');
                    form.trigger('reset');
                    return false;
                    break;
                case 'serve':
                    $("#console").append('> Hey! you cant do that here!\n\n');
                    form.trigger('reset');
                    return false;
                    break;
                case 'tinker':
                    $("#console").append('> Hey! you cant do that here!\n\n');
                    form.trigger('reset');
                    return false;
                    break;
                case 'down':
                    $("#console").append('> Hey! annh annh annh!\n\n');
                    form.trigger('reset');
                    return false;
                    break;

                default:
                    break;
            }

            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                data: form.serialize(), // serializes the form's elements.
                success: function(data) {
                    $("#input").removeAttr('disabled');
                    $("#loading").hide();
                    form.trigger('reset');
                    $("#console").append('<div class="my-2"> > ' + data + '</div>');
                    var console = document.getElementById('console');
                    console.scrollTop = console.scrollHeight;
                },
                error: function(error) {
                    $("#loading").hide();
                    $("#input").removeAttr('disabled');
                    alert('Unexecutable Command, Sorry !');
                }
            });
        });
        $(document).ajaxStart(function() {
            $("#input").attr('disabled', '');
            $("#loading").show();
        });
    </script>
@endpush
