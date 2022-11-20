<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            Ubah User
        </h2>
    </x-slot>
    
    <div>
        <div class="max-w-4x1 mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('manager.update', $manager->id) }}">
                    @csrf 
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <label for="name" class="block font-medium text-sm text-gray-700">Nama</label>
                                <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('name', $manager->name)}}"/>
                                @error('name')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
            
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                                <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('email', $manager->email)}}"/>
                                @error('email')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="shadow overflow-hidden sm:rounded-md">
                                <label for="password" class="block font-medium text-sm text-gray-700">Kata sandi</label>
                                <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                @error('password')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <label for="roles" class="block font-medium text-sm text-gray-700">Roles</label>
                            <select name="roles[]" id="roles" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}"{{ in_array($id, old('roles', $manager->roles->pluck('id')->toArray())) ? ' selected' : ''}}>
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>
                            @error('roles')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Ubah
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>