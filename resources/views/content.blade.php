@extends('layouts.admin')

@section('content')
	<div class="row">
		<div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
			<div class="widget">
				<div class="widget-header bordered-bottom bordered-danger">
                    <span class="widget-caption">Pencarian Data Bagi Hasil</span>
                </div>
                <div class="widget-body">
                	<form id="frmJenissurat" method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="nama_jenis">Pabrik Gula</label>
                            <select class="form-control" id="pg" name="pg">
                                <option value="IF30">PG Pangka</option>
                                <option value="IF32">PG Sragi</option>
                                <option value="IF33">PG Rendeng</option>
                                <option value="IF34">PG Mojo</option>
                                <option value="IF35">PG Tasikmadu</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="kode_jenis">Kode Jenis</label>
                                    <input type="text" class="form-control" name="kode_jenis" id="kode_jenis" maxlength="5">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" rows="3" id="deskripsi" name="deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Simpan</button>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/validation/bootstrapValidator.js') }}"></script>
    <script type="text/javascript">
        // Function mencegah submit form dari tombol enter
        function stopRKey(evt) {
            var evt = (evt) ? evt : ((event) ? event : null);
            var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
            if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
        }
        document.onkeypress = stopRKey;

        $(document).ready(function(){
            $('#frmJenissurat').bootstrapValidator({
                excluded: [':hidden', ':disabled'],
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    nama_jenis: {
                        validators: {
                            notEmpty: {
                                message: 'Kolom harus diisi !'
                            },
                            stringLength: {
		                        max: 20,
		                        message: 'Maksimal 20 karakter yang diperbolehkan'
		                    }
                        }
                    },
                    kode_jenis: {
                    	validators: {
                            notEmpty: {
                                message: 'Kolom harus diisi !'
                            },
                            stringLength: {
		                        max: 5,
		                        message: 'Maksimal 5 karakter yang diperbolehkan'
		                    }
                        }
                    },
                    deskripsi: {
                    	validators: {
                            notEmpty: {
                                message: 'Kolom harus diisi !'
                            }
                        }
                    }
                }
            }).on('success.field.bv', function(e, data){
                var $parent = data.element.parents('.form-group');
                $parent.removeClass('has-success');
                $parent.find('.form-control-feedback[data-bv-icon-for="' + data.field + '"]').hide();
            });
        });
    </script>
@endsection