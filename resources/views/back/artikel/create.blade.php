<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Tulisan
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-2xl">
                    <section>
                        <form method="post" action="{{ route('artikel.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf
                        <header>
                                    <h2 class="text-lg font-medium text-gray-900">
                                        Masukan Data Nama Kategori
                                    </h2>

                                    <p class="mt-1 text-sm text-gray-600">
                                        Silakan melakukan data
                                    </p>
                            </header>
                                <div>
                                    <x-input-label for="judul_artikel" value="Judul Artikel" />
                                    <x-text-input id="judul_artikel" name="judul_artikel"  type="text" class="mt-1 block w-full" required />
                                </div>
                                <div>
                                    <x-input-label for="body" value="Body" />
                                    <x-textarea-trix value="hhhh" id="x" name="body"></x-textarea-trix>
                                </div>
                                <div>
                                    <x-input-label for="kategori" value="Kategori_id" />
                                        <select type="text" name="kategori_id" class="mt-1 block w-full border border-gray-300 rounded-md" required>
                                            @foreach($kategori as $row)
                                            <option value={{$row->id}}>{{$row->nama_kategori}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div>
                                    <x-input-label for="gambar_artikel" value="Gambar Thumbnil" />
                                    <input type="file" id="gambar_artikel" name="gambar_artikel" class="mt-1 w-full border border-gray-300 rounded-md" required />
                                </div>
                                <div>
                                    <x-input-label for="status" value="Status" />
                                        <select type="text" name="status" class="mt-1 w-full border border-gray-300 rounded-md" id="text">
                                            <option value="publish">publish</option>
                                            <option value="Draft">Draft</option>
                                        </select>
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
