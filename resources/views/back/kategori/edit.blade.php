<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Kategory
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <form method="post" action="{{ route('kategori.update', $kategori->id) }}" class="space-y-6" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <header>
                                <h2 class="text-lg font-medium text-gray-900">
                                    Edit Data Nama Kategori
                                </h2>

                                <p class="mt-1 text-sm text-gray-600">
                                    Silakan melakukan perubahan data
                                </p>
                            </header>
                            <div>
                                <x-input-label for="name" value="Nama Kategori" />
                                <x-text-input id="name" name="nama_kategori" :value="old('nama_kategori', $kategori->nama_kategori)" type="text" class="mt-1 block w-full"
                                    required />
                            </div>

                            <div class="flex items-center gap-4">
                                <a href="{{ route('kategori.index') }}">
                                    <x-secondary-button>Kembali</x-secondary-button>
                                </a>
                                <x-primary-button>Simpan</x-primary-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
