<div>
    <div class="form-group">
        <div class="col-md-12">
        <label for="provinsi">Provinsi</label>
            <select wire:model="Dprovinsi" class="form-control">
                <option value="" selected>pilih provinsi</option>
                @foreach($provinsi as $data)
                <option value="{{ $data->id }}">{{ $data->nama_provinsi }}</option>
                @endforeach
            </select>
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-12">
            <label for="Kota">Kota</label>
            <select wire:model="Dkota" class="form-control">
                <option value="" selected>pilih Kota</option>
                @foreach($kota as $data)
                <option value="{{ $data->id }}">{{ $data->nama_kota }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <label for="kecamatan">kecamatan</label>
            <select wire:model="Dkecamatan" class="form-control">
                <option value="" selected>pilih kecamatan</option>
                @foreach($kecamatan as $kecamatans)
                <option value="{{ $kecamatans->id }}">{{ $kecamatans->nama_kecamatan }}</option>
                @endforeach
            </select>            
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <label for="kelurahan" >kelurahan</label>
            <select wire:model="Dkelurahan" class="form-control">
                <option value="" selected>pilih kelurahan</option>
                @foreach($kelurahan as $kelurahans)
                <option value="{{ $kelurahans->id }}">{{ $kelurahans->nama_kelurahan }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">       
            <label for="rw" >Rw</label>
            <select wire:model="Drw" class="form-control" name="id_rw">
                <option value="" selected>pilih rw</option>
                @foreach($rw as $rws)
                <option value="{{ $rws->id }}">{{ $rws->no_rw }}</option>
                @endforeach
            </select>              
        </div>
    </div>
    
</div>