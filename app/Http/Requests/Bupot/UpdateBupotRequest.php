<?php

namespace App\Http\Requests\Bupot;

use App\Support\Enums\PTKPEnum;
use App\Support\Enums\GenderEnum;
use App\Support\Enums\IntentEnum;
use App\Support\Enums\BupotTypeEnum;
use App\Support\Enums\BupotDokumenTypeEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBupotRequest extends FormRequest {
    public function rules(): array {
        $intent = $this->get('intent');
        switch ($intent) {
            case IntentEnum::API_BUPOT_BPPU->value:
                return [
                    'pembuat_id' => 'sometimes|exists:sistems,id',
                    'representatif_id' => 'nullable|exists:sistems,id',
                    'tipe_bupot' => 'sometimes|in:' . implode(',', BupotTypeEnum::toArray()),
                    'masa_awal' => 'sometimes|date',
                    'status' => 'sometimes|in:' . implode(',', ['valid', 'invalid', 'normal', 'pembetulan', 'dihapus', 'pembatalan']),
                    'status_penerbitan' => 'sometimes|in:' . implode(',', ['draft', 'published', 'invalid']),
                    'npwp_akun' => 'sometimes|string|max:255',
                    'nama_akun' => 'sometimes|string|max:255',
                    'nitku' => 'sometimes|string|max:255',
                    'fasilitas_pajak' => 'sometimes|string|max:255',
                    'nama_objek_pajak' => 'sometimes|string',
                    'jenis_pajak' => 'sometimes|string|max:255',
                    'kode_objek_pajak' => 'sometimes|string|max:255',
                    'sifat_pajak_penghasilan' => 'sometimes|string|max:255',
                    'dasar_pengenaan_pajak' => 'sometimes|numeric|min:0',
                    'tarif_pajak' => 'sometimes|numeric|min:0',
                    'pajak_penghasilan' => 'sometimes|numeric|min:0',
                    'kap' => 'sometimes|string|max:255',
                    'jenis_dokumen' => 'sometimes|in:' . implode(',', BupotDokumenTypeEnum::toArray()),
                    'nomor_dokumen' => 'sometimes|string|max:255',
                    'tanggal_dokumen' => 'sometimes|date',
                    'nitku_dokumen' => 'sometimes|string|max:255',
                ];
            case IntentEnum::API_BUPOT_BPNR->value:
                return [
                    'pembuat_id' => 'sometimes|exists:sistems,id',
                    'representatif_id' => 'nullable|exists:sistems,id',
                    'tipe_bupot' => 'sometimes|in:' . implode(',', BupotTypeEnum::toArray()),
                    'masa_awal' => 'sometimes|date',
                    'status' => 'sometimes|in:' . implode(',', ['valid', 'invalid', 'normal', 'pembetulan', 'dihapus', 'pembatalan']),
                    'status_penerbitan' => 'sometimes|in:' . implode(',', ['draft', 'published', 'invalid']),
                    'fasilitas_pajak' => 'sometimes|string|max:255',
                    'npwp_akun' => 'sometimes|string|max:255',
                    'nama_akun' => 'sometimes|string|max:255',
                    'alamat_utama_akun' => 'sometimes|string|max:255',
                    'negara_akun' => 'sometimes|string|max:255',
                    'tanggal_lahir_akun' => 'sometimes|date',
                    'tempat_lahir_akun' => 'sometimes|string|max:255',
                    'nomor_paspor_akun' => 'sometimes|string|max:255',
                    'nomor_kitas_kitap_akun' => 'sometimes|string|max:255',
                    'nama_objek_pajak' => 'sometimes|string',
                    'jenis_pajak' => 'sometimes|string|max:255',
                    'kode_objek_pajak' => 'sometimes|string|max:255',
                    'sifat_pajak_penghasilan' => 'sometimes|string|max:255',
                    'dasar_pengenaan_pajak' => 'sometimes|numeric|min:0',
                    'persentase_penghasilan_bersih' => 'sometimes|numeric|min:0',
                    'tarif_pajak' => 'sometimes|numeric|min:0',
                    'pajak_penghasilan' => 'sometimes|numeric|min:0',
                    'kap' => 'sometimes|string|max:255',
                    'jenis_dokumen' => 'sometimes|in:' . implode(',', BupotDokumenTypeEnum::toArray()),
                    'nomor_dokumen' => 'sometimes|string|max:255',
                    'tanggal_dokumen' => 'sometimes|date',
                    'nitku_dokumen' => 'sometimes|string|max:255',
                ];
            case IntentEnum::API_BUPOT_PS->value:
                return [
                    'pembuat_id' => 'sometimes|exists:sistems,id',
                    'representatif_id' => 'nullable|exists:sistems,id',
                    'tipe_bupot' => 'sometimes|in:' . implode(',', BupotTypeEnum::toArray()),
                    'masa_awal' => 'sometimes|date',
                    'status' => 'sometimes|in:' . implode(',', ['valid', 'invalid', 'normal', 'pembetulan', 'dihapus', 'pembatalan']),
                    'status_penerbitan' => 'sometimes|in:' . implode(',', ['draft', 'published', 'invalid']),
                    'fasilitas_pajak' => 'sometimes|string|max:255',
                    'nama_objek_pajak' => 'sometimes|string',
                    'jenis_pajak' => 'sometimes|string|max:255',
                    'kode_objek_pajak' => 'sometimes|string|max:255',
                    'sifat_pajak_penghasilan' => 'sometimes|string|max:255',
                    'dasar_pengenaan_pajak' => 'sometimes|numeric|min:0',
                    'tarif_pajak' => 'sometimes|numeric|min:0',
                    'pajak_penghasilan' => 'sometimes|numeric|min:0',
                    'kap' => 'sometimes|string|max:255',
                    'jenis_dokumen' => 'sometimes|in:' . implode(',', BupotDokumenTypeEnum::toArray()),
                    'nomor_dokumen' => 'sometimes|string|max:255',
                    'tanggal_dokumen' => 'sometimes|date',
                    'nitku_dokumen' => 'sometimes|string|max:255',
                    // NAMA, NPWP, NITKU AKUN ada di SERVICE BUPOT PS
                ];
            case IntentEnum::API_BUPOT_PSD->value:
                return [
                    'pembuat_id' => 'sometimes|exists:sistems,id',
                    'representatif_id' => 'nullable|exists:sistems,id',
                    'tipe_bupot' => 'sometimes|in:' . implode(',', BupotTypeEnum::toArray()),
                    'masa_awal' => 'sometimes|date',
                    'status' => 'sometimes|in:' . implode(',', ['valid', 'invalid', 'normal', 'pembetulan', 'dihapus', 'pembatalan']),
                    'status_penerbitan' => 'sometimes|in:' . implode(',', ['draft', 'published', 'invalid']),
                    'fasilitas_pajak' => 'sometimes|string|max:255',
                    'nama_objek_pajak' => 'sometimes|string',
                    'jenis_pajak' => 'sometimes|string|max:255',
                    'kode_objek_pajak' => 'sometimes|string|max:255',
                    'sifat_pajak_penghasilan' => 'sometimes|string|max:255',
                    'dasar_pengenaan_pajak' => 'sometimes|numeric|min:0',
                    'tarif_pajak' => 'sometimes|numeric|min:0',
                    'pajak_penghasilan' => 'sometimes|numeric|min:0',
                    'kap' => 'sometimes|string|max:255',
                    'jenis_dokumen' => 'sometimes|in:' . implode(',', BupotDokumenTypeEnum::toArray()),
                    'nomor_dokumen' => 'sometimes|string|max:255',
                    'tanggal_dokumen' => 'sometimes|date',
                    'nitku_dokumen' => 'sometimes|string|max:255',
                    // NAMA, NPWP, NITKU AKUN ada di SERVICE BUPOT PSD
                ];
            case IntentEnum::API_BUPOT_BP21->value:
                return [
                    'pembuat_id' => 'sometimes|exists:sistems,id',
                    'representatif_id' => 'nullable|exists:sistems,id',
                    'tipe_bupot' => 'sometimes|in:' . implode(',', BupotTypeEnum::toArray()),
                    'masa_awal' => 'sometimes|date',
                    'status' => 'sometimes|in:' . implode(',', ['valid', 'invalid', 'normal', 'pembetulan', 'dihapus', 'pembatalan']),
                    'status_penerbitan' => 'sometimes|in:' . implode(',', ['draft', 'published', 'invalid']),
                    'npwp_akun' => 'sometimes|string|max:255',
                    'nama_akun' => 'sometimes|string|max:255',
                    'nitku' => 'sometimes|string|max:255',
                    'ptkp_akun' => 'sometimes|in:' . implode(',', PTKPEnum::toArray()),
                    'fasilitas_pajak' => 'sometimes|string|max:255',
                    'nama_objek_pajak' => 'sometimes|string',
                    'jenis_pajak' => 'sometimes|string|max:255',
                    'kode_objek_pajak' => 'sometimes|string|max:255',
                    'sifat_pajak_penghasilan' => 'sometimes|string|max:255',
                    'bruto_2_tahun' => 'sometimes|numeric|min:0',
                    'dasar_pengenaan_pajak' => 'sometimes|numeric|min:0',
                    'persentase_penghasilan_bersih' => 'sometimes|numeric|min:0',
                    'tarif_pajak' => 'sometimes|numeric|min:0',
                    'pajak_penghasilan' => 'sometimes|numeric|min:0',
                    'kap' => 'sometimes|string|max:255',
                    'jenis_dokumen' => 'sometimes|in:' . implode(',', BupotDokumenTypeEnum::toArray()),
                    'nomor_dokumen' => 'sometimes|string|max:255',
                    'tanggal_dokumen' => 'sometimes|date',
                    'nitku_dokumen' => 'sometimes|string|max:255',
                ];
            case IntentEnum::API_BUPOT_BP26->value:
                return [
                    'pembuat_id' => 'sometimes|exists:sistems,id',
                    'representatif_id' => 'nullable|exists:sistems,id',
                    'tipe_bupot' => 'sometimes|in:' . implode(',', BupotTypeEnum::toArray()),
                    'masa_awal' => 'sometimes|date',
                    'status' => 'sometimes|in:' . implode(',', ['valid', 'invalid', 'normal', 'pembetulan', 'dihapus', 'pembatalan']),
                    'status_penerbitan' => 'sometimes|in:' . implode(',', ['draft', 'published', 'invalid']),
                    'fasilitas_pajak' => 'sometimes|string|max:255',
                    'npwp_akun' => 'sometimes|string|max:255',
                    'nama_akun' => 'sometimes|string|max:255',
                    'alamat_utama_akun' => 'sometimes|string|max:255',
                    'negara_akun' => 'sometimes|string|max:255',
                    'tanggal_lahir_akun' => 'sometimes|date',
                    'tempat_lahir_akun' => 'sometimes|string|max:255',
                    'nomor_paspor_akun' => 'sometimes|string|max:255',
                    'nomor_kitas_kitap_akun' => 'sometimes|string|max:255',
                    'nama_objek_pajak' => 'sometimes|string',
                    'jenis_pajak' => 'sometimes|string|max:255',
                    'kode_objek_pajak' => 'sometimes|string|max:255',
                    'sifat_pajak_penghasilan' => 'sometimes|string|max:255',
                    'dasar_pengenaan_pajak' => 'sometimes|numeric|min:0',
                    'persentase_penghasilan_bersih' => 'sometimes|numeric|min:0',
                    'tarif_pajak' => 'sometimes|numeric|min:0',
                    'pajak_penghasilan' => 'sometimes|numeric|min:0',
                    'kap' => 'sometimes|string|max:255',
                    'jenis_dokumen' => 'sometimes|in:' . implode(',', BupotDokumenTypeEnum::toArray()),
                    'nomor_dokumen' => 'sometimes|string|max:255',
                    'tanggal_dokumen' => 'sometimes|date',
                    'nitku_dokumen' => 'sometimes|string|max:255',
                ];
            case IntentEnum::API_BUPOT_BPA1->value:
                return [
                    'pembuat_id' => 'sometimes|exists:sistems,id',
                    'representatif_id' => 'nullable|exists:sistems,id',
                    'tipe_bupot' => 'sometimes|in:' . implode(',', BupotTypeEnum::toArray()),
                    'bekerja_di_lebih_dari_satu_pemberi_kerja' => 'sometimes|boolean',
                    'masa_awal' => 'sometimes|date',
                    'masa_akhir' => 'sometimes|date',
                    'status' => 'sometimes|in:' . implode(',', ['valid', 'invalid', 'normal', 'pembetulan', 'dihapus', 'pembatalan']),
                    'status_penerbitan' => 'sometimes|in:' . implode(',', ['draft', 'published', 'invalid']),
                    'pegawai_asing' => 'sometimes|boolean',
                    'npwp_akun' => 'sometimes|string|max:255',
                    'nama_akun' => 'sometimes|string|max:255',
                    'alamat_utama_akun' => 'sometimes|string|max:255',
                    'nomor_paspor_akun' => 'sometimes|string|max:255',
                    'negara_akun' => 'sometimes|string|max:255',
                    'jenis_kelamin_akun' => 'sometimes|in:' . implode(',', GenderEnum::toArray()),
                    'ptkp_akun' => 'sometimes|in:' . implode(',', PTKPEnum::toArray()),
                    'posisi_akun' => 'sometimes|string|max:255',
                    'nama_objek_pajak' => 'sometimes|string',
                    'jenis_pajak' => 'sometimes|string|max:255',
                    'kode_objek_pajak' => 'sometimes|string|max:255',
                    'jenis_pemotongan' => 'sometimes|string|max:255',
                    'gaji_pokok_pensiun' => 'sometimes|numeric|min:0',
                    'pembulatan_kotor' => 'sometimes|numeric|min:0',
                    'tunjangan_pph' => 'sometimes|numeric|min:0',
                    'tunjangan_lainnya' => 'sometimes|numeric|min:0',
                    'honorarium_imbalan_lainnya' => 'sometimes|numeric|min:0',
                    'premi_asuransi_pemberi_kerja' => 'sometimes|numeric|min:0',
                    'natura_pph_pasal_21' => 'sometimes|numeric|min:0',
                    'tantiem_bonus_gratifikasi_jasa_thr' => 'sometimes|numeric|min:0',
                    'dasar_pengenaan_pajak' => 'sometimes|numeric|min:0',
                    'biaya_jabatan' => 'sometimes|numeric|min:0',
                    'iuran_pensiun' => 'sometimes|numeric|min:0',
                    'sumbangan_keagamaan_pemberi_kerja' => 'sometimes|numeric|min:0',
                    'jumlah_pengurangan' => 'sometimes|numeric|min:0',
                    'jumlah_penghasilan_neto' => 'sometimes|numeric|min:0',
                    'nomor_bpa1_sebelumnya' => 'sometimes|numeric|min:0',
                    'penghasilan_neto_sebelumnya' => 'sometimes|numeric|min:0',
                    'penghasilan_neto_pph_pasal_21' => 'sometimes|numeric|min:0',
                    'penghasilan_tidak_kena_pajak' => 'sometimes|numeric|min:0',
                    'penghasilan_kena_pajak' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_penghasilan_kena_pajak' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_terutang' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_potongan_bpa1_sebelumnya' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_terutang_bupot_ini' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_ditanggung_pemerintah' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_masa_pajak_terakhir' => 'sometimes|numeric|min:0',
                    'fasilitas_pajak' => 'sometimes|string|max:255',
                    'kap' => 'sometimes|string|max:255',
                    'nitku' => 'sometimes|string|max:255',
                ];
            case IntentEnum::API_BUPOT_BPA2->value:
                return [
                    'pembuat_id' => 'sometimes|exists:sistems,id',
                    'representatif_id' => 'nullable|exists:sistems,id',
                    'tipe_bupot' => 'sometimes|in:' . implode(',', BupotTypeEnum::toArray()),
                    'bekerja_di_lebih_dari_satu_pemberi_kerja' => 'sometimes|boolean',
                    'masa_awal' => 'sometimes|date',
                    'masa_akhir' => 'sometimes|date',
                    'status' => 'sometimes|in:' . implode(',', ['valid', 'invalid', 'normal', 'pembetulan', 'dihapus', 'pembatalan']),
                    'status_penerbitan' => 'sometimes|in:' . implode(',', ['draft', 'published', 'invalid']),
                    'npwp_akun' => 'sometimes|string|max:255',
                    'nama_akun' => 'sometimes|string|max:255',
                    'alamat_utama_akun' => 'sometimes|string|max:255',
                    'nip_akun' => 'sometimes|string|max:255',
                    'jenis_kelamin_akun' => 'sometimes|in:' . implode(',', GenderEnum::toArray()),
                    'pangkat_golongan_akun' => 'sometimes|string|max:255',
                    'ptkp_akun' => 'sometimes|in:' . implode(',', PTKPEnum::toArray()),
                    'posisi_akun' => 'sometimes|string|max:255',
                    'nama_objek_pajak' => 'sometimes|string',
                    'jenis_pajak' => 'sometimes|string|max:255',
                    'kode_objek_pajak' => 'sometimes|string|max:255',
                    'jenis_pemotongan' => 'sometimes|string|max:255',
                    'gaji_pokok_pensiun' => 'sometimes|numeric|min:0',
                    'tunjangan_istri' => 'sometimes|numeric|min:0',
                    'tunjangan_anak' => 'sometimes|numeric|min:0',
                    'tunjangan_perbaikan_penghasilan' => 'sometimes|numeric|min:0',
                    'tunjangan_struktural_fungsional' => 'sometimes|numeric|min:0',
                    'tunjangan_beras' => 'sometimes|numeric|min:0',
                    'tunjangan_lainnya' => 'sometimes|numeric|min:0',
                    'penghasilan_tetap_lainnya' => 'sometimes|numeric|min:0',
                    'biaya_jabatan' => 'sometimes|numeric|min:0',
                    'iuran_pensiun' => 'sometimes|numeric|min:0',
                    'sumbangan_keagamaan_pemberi_kerja' => 'sometimes|numeric|min:0',
                    'jumlah_pengurangan' => 'sometimes|numeric|min:0',
                    'jumlah_penghasilan_neto' => 'sometimes|numeric|min:0',
                    'nomor_bpa1_sebelumnya' => 'sometimes|numeric|min:0',
                    'penghasilan_neto_sebelumnya' => 'sometimes|numeric|min:0',
                    'penghasilan_neto_pph_pasal_21' => 'sometimes|numeric|min:0',
                    'penghasilan_tidak_kena_pajak' => 'sometimes|numeric|min:0',
                    'penghasilan_kena_pajak' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_penghasilan_kena_pajak' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_terutang' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_potongan_bpa1_sebelumnya' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_terutang_bupot_ini' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_ditanggung_pemerintah' => 'sometimes|numeric|min:0',
                    'pph_pasal_21_masa_pajak_terakhir' => 'sometimes|numeric|min:0',
                    'kap' => 'sometimes|string|max:255',
                    'nitku' => 'sometimes|string|max:255',
                ];
            case IntentEnum::API_BUPOT_BPBPT->value:
                return [
                    'pembuat_id' => 'sometimes|exists:sistems,id',
                    'representatif_id' => 'nullable|exists:sistems,id',
                    'tipe_bupot' => 'sometimes|in:' . implode(',', BupotTypeEnum::toArray()),
                    'masa_awal' => 'sometimes|date',
                    'status' => 'sometimes|in:' . implode(',', ['valid', 'invalid', 'normal', 'pembetulan', 'dihapus', 'pembatalan']),
                    'status_penerbitan' => 'sometimes|in:' . implode(',', ['draft', 'published', 'invalid']),
                    'pegawai_asing' => 'sometimes|boolean',
                    'npwp_akun' => 'sometimes|string|max:255',
                    'nama_akun' => 'sometimes|string|max:255',
                    'alamat_utama_akun' => 'sometimes|string|max:255',
                    'nomor_paspor_akun' => 'sometimes|string|max:255',
                    'negara_akun' => 'sometimes|string|max:255',
                    'ptkp_akun' => 'sometimes|in:' . implode(',', PTKPEnum::toArray()),
                    'posisi_akun' => 'sometimes|string|max:255',
                    'fasilitas_pajak' => 'sometimes|string|max:255',
                    'nama_objek_pajak' => 'sometimes|string',
                    'jenis_pajak' => 'sometimes|string|max:255',
                    'kode_objek_pajak' => 'sometimes|string|max:255',
                    'dasar_pengenaan_pajak' => 'sometimes|numeric|min:0',
                    'tarif_pajak' => 'sometimes|numeric|min:0',
                    'pajak_penghasilan' => 'sometimes|numeric|min:0',
                    'kap' => 'sometimes|string|max:255',
                    'nitku' => 'sometimes|string|max:255',
                ];
            // case IntentEnum::API_BUPOT_DSBP->value:
            //     return [
            //         'pembuat_id' => 'sometimes|exists:sistems,id',
            //         'representatif_id' => 'nullable|exists:sistems,id',
            //         'tipe_bupot' => 'sometimes|in:' . implode(',', BupotTypeEnum::toArray()),
            //     ];
        }

        return [
            // Add your validation rules here
        ];
    }
}
