<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Username -->
        <div>
            <x-input-label for="uname" :value="__('Username')" />
            <x-text-input id="uname" class="block mt-1 w-full" type="text" name="uname" :value="old('uname')" required autofocus autocomplete="uname" />
            <x-input-error :messages="$errors->get('uname')" class="mt-2" />
        </div>

        <!-- First Name -->
        <div class="mt-4">
            <x-input-label for="fname" :value="__('First Name')" />
            <x-text-input id="fname" class="block mt-1 w-full" type="text" name="fname" :value="old('fname')" required autofocus autocomplete="fname" />
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
        </div>

        <!-- Middle Name -->
        <div class="mt-4">
            <x-input-label for="mname" :value="__('Middle Name')" />
            <x-text-input id="mname" class="block mt-1 w-full" type="text" name="mname" :value="old('mname')" autocomplete="mname" />
            <x-input-error :messages="$errors->get('mname')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="mt-4">
            <x-input-label for="lname" :value="__('Last Name')" />
            <x-text-input id="lname" class="block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="lname" />
            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label for="bdate" :value="__('Date of Birth')" />
            <x-text-input id="bdate" class="block mt-1 w-full" type="date" name="bdate" :value="old('bdate')" required />
            <x-input-error :messages="$errors->get('bdate')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Contact Number -->
        <div class="mt-4">
            <x-input-label for="contact_no" :value="__('Contact Number')" />
            <x-text-input id="contact_no" class="block mt-1 w-full" type="text" name="contact_no" :value="old('contact_no')" required />
            <x-input-error :messages="$errors->get('contact_no')" class="mt-2" />
        </div>

        <!-- House Block Number -->
        <div class="mt-4">
            <x-input-label for="house_blk_no" :value="__('House Block Number')" />
            <x-text-input id="house_blk_no" class="block mt-1 w-full" type="number" name="house_blk_no" :value="old('house_blk_no')" required />
            <x-input-error :messages="$errors->get('house_blk_no')" class="mt-2" />
        </div>

        <!-- House Lot Number -->
        <div class="mt-4">
            <x-input-label for="house_lot_no" :value="__('House Lot Number')" />
            <x-text-input id="house_lot_no" class="block mt-1 w-full" type="number" name="house_lot_no" :value="old('house_lot_no')" required />
            <x-input-error :messages="$errors->get('house_lot_no')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
