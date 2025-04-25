<x-alert />

<div class="">
    @csrf()
    <div class="mb-5">
        <input type="text" name="name" placeholder="Nome" value="{{ $user->name ?? old('name') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-5">
        <input type="email" name="email" placeholder="E-mail"value="{{ $user->email ?? old('email') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="mb-5">
        <input type="password" name="password" placeholder="Senha"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
    </div>
    <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">
        Enviar
    </button>
</div>
