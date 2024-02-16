@extends('Dashboard')
@section('data')

<div class="container mx-auto px-1">
    <div class="flex flex-wrap justify-center items-center gap-10">

        <dotlottie-player src="https://lottie.host/44cc8e9b-98a6-4ec7-b909-6f31b361f4cc/2bw16EnMEz.json" background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay></dotlottie-player>

        <div class="card-profile relative -left-10 lg:left-0">
                <div class="w-96 h-56 m-auto bg-red-400 rounded-xl relative text-white shadow-2xl transition-transform transform hover:scale-110">
                    <div class="w-full px-8 absolute top-8">
                        <div class="flex justify-between">
                            <div class="">
                                <p class="font-light">
                                    Name
                                </h1>
                                <p class="font-medium tracking-widest">
                                    {{$user->namalengkap}}
                                </p>
                            </div>
                            <img class="w-14 h-14" src="{{asset('assets/image/logo.svg')}}" />
                        </div>
                        <div class="pt-1">
                            <p class="font-light">
                                Email Akun
                            </h1>
                            <p class="font-medium tracking-more-wider">
                                {{$user->email}}
                            </p>
                        </div>
                        <div class="pt-6 pr-6">
                            <div class="flex justify-between">
                                <div class="">
                                    <p class="font-light text-xs">
                                        Alamat
                                    </h1>
                                    <p class="font-medium tracking-wider text-sm">
                                        {{$user->alamat}}
                                    </p>
                                </div>
                                <div class="">
                                    <p class="font-light text-xs text-xs">
                                        Tanggal Akun
                                    </h1>
                                    <p class="font-medium tracking-wider text-sm">
                                        {{date('Y-m-d')}}
                                    </p>
                                </div>

                                <div class="">
                                    <p class="font-light text-xs">
                                        Hapus Akun
                                    </p>
                                    <p class="font-bold tracking-more-wider text-sm">
                                    <x-danger-button
                                    x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                                >{{ __('Delete Account') }}</x-danger-button>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</div>
@endsection
