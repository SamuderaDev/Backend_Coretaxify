<?php

namespace App\Services;

use App\Models\Pic;
use App\Models\Spt;
use App\Models\Faktur;
use App\Models\Sistem;
use App\Models\SptPpn;
use App\Models\Assignment;
use Illuminate\Http\Request;
use App\Models\AssignmentUser;
use App\Support\Enums\IntentEnum;
use App\Http\Resources\SptResource;
use App\Support\Enums\SptModelEnum;
use App\Support\Enums\SptStatusEnum;
use Illuminate\Support\Facades\Auth;
use App\Support\Enums\JenisPajakEnum;
use App\Support\Enums\FakturStatusEnum;
use Illuminate\Database\Eloquent\Model;
use App\Support\Interfaces\Services\SptServiceInterface;
use App\Support\Interfaces\Repositories\SptRepositoryInterface;
use Adobrovolsky97\LaravelRepositoryServicePattern\Services\BaseCrudService;

class SptService extends BaseCrudService implements SptServiceInterface {
    protected function getRepositoryClass(): string {
        return SptRepositoryInterface::class;
    }

    public function update ($spt, $request):Model{
        $intent = $request['intent'];

        $fields_spt_ppn = [
            'cl_1a1_dpp', 'cl_1a5_dpp', 'cl_1a9_dpp', 'cl_1a5_ppn', 'cl_1a9_ppn','cl_1a5_ppnbm','cl_1a9_ppnbm','cl_2e_ppn','cl_2h_dpp','cl_2i_dpp','cl_3b_ppn','cl_3d_ppn','cl_3f_ppn','cl_6b_ppnbm','cl_6d_ppnbm','cl_7a_dpp','cl_7b_dpp','cl_7a_ppn','cl_7b_ppn','cl_7a_ppnbm','cl_7b_ppnbm','cl_7a_dpp_lain','cl_7b_dpp_lain','cl_8a_dpp','cl_8b_dpp','cl_8a_ppn','cl_8b_ppn','cl_8a_ppnbm','cl_8b_ppnbm','cl_8a_dpp_lain','cl_8b_dpp_lain','cl_8d_diminta_pengembalian', 'cl_3h_diminta','cl_3h_nomor_rekening','cl_3h_nama_bank','cl_3h_nama_pemilik_rekening',
        ];
        $requestData = is_array($request) ? $request : $request->all();

        switch ($intent) {
            case IntentEnum::API_UPDATE_SPT_PPN_BAYAR->value:

                $spt_ppn = SptPpn::where('spt_id', $spt->id)->first();

                foreach ($fields_spt_ppn as $field) {
                    if (array_key_exists($field, $requestData)) {
                        $spt_ppn->$field = $requestData[$field];
                    }
                }

                $spt_ppn->fill($requestData);
                $spt_ppn->save();

                $spt->status = SptStatusEnum::DILAPORKAN->value;
                $spt->save();
                break;
            case IntentEnum::API_UPDATE_SPT_PPN_KONSEP->value:

                $spt_ppn = SptPpn::where('spt_id', $spt->id)->first();

                foreach ($fields_spt_ppn as $field) {
                    if (array_key_exists($field, $requestData)) {
                        $spt_ppn->$field = $requestData[$field];
                    }
                }

                $spt_ppn->fill($requestData);
                $spt_ppn->save();

                $spt->status = SptStatusEnum::DIBUAT->value;
                $spt->save();
                break;
        }

        return $spt;
    }

    public function calculateSpt(Spt $spt, Request $request) {
        $data = SptPpn::where('id', $spt->id)->first();

        $data['cl_1a1_dpp'] = $request['cl_1a1_dpp'];
        $data['cl_1a5_dpp'] = $request['cl_1a5_dpp'];
        $data['cl_1a9_dpp'] = $request['cl_1a9_dpp'];
        $data['cl_1a5_ppn'] = $request['cl_1a5_ppn'];
        $data['cl_1a9_ppn'] = $request['cl_1a9_ppn'];
        $data['cl_1a5_ppnbm'] = $request['cl_1a5_ppnbm'];
        $data['cl_1a9_ppnbm'] = $request['cl_1a9_ppnbm'];
        $data['cl_2e_ppn'] = $request['cl_2e_ppn'];
        $data['cl_2h_dpp'] = $request['cl_2h_dpp'];
        $data['cl_2i_dpp'] = $request['cl_2i_dpp'];
        $data['cl_3b_ppn'] = $request['cl_3b_ppn'];
        $data['cl_3d_ppn'] = $request['cl_3d_ppn'];
        $data['cl_3f_ppn'] = $request['cl_3f_ppn'];
        $data['cl_6b_ppnbm'] = $request['cl_6b_ppnbm'];
        $data['cl_6d_ppnbm'] = $request['cl_6d_ppnbm'];
        $data['cl_7a_dpp'] = $request['cl_7a_dpp'];
        $data['cl_7b_dpp'] = $request['cl_7b_dpp'];
        $data['cl_7a_ppn'] = $request['cl_7a_ppn'];
        $data['cl_7b_ppn'] = $request['cl_7b_ppn'];
        $data['cl_7a_ppnbm'] = $request['cl_7a_ppnbm'];
        $data['cl_7b_ppnbm'] = $request['cl_7b_ppnbm'];
        $data['cl_7a_dpp_lain'] = $request['cl_7a_dpp_lain'];
        $data['cl_7b_dpp_lain'] = $request['cl_7b_dpp_lain'];
        $data['cl_8a_dpp'] = $request['cl_8a_dpp'];
        $data['cl_8b_dpp'] = $request['cl_8b_dpp'];
        $data['cl_8a_ppn'] = $request['cl_8a_ppn'];
        $data['cl_8b_ppn'] = $request['cl_8b_ppn'];
        $data['cl_8a_ppnbm'] = $request['cl_8a_ppnbm'];
        $data['cl_8b_ppnbm'] = $request['cl_8b_ppnbm'];
        $data['cl_8a_dpp_lain'] = $request['cl_8a_dpp_lain'];
        $data['cl_8b_dpp_lain'] = $request['cl_8b_dpp_lain'];

        $data['cl_1a_jumlah_dpp'] =
           ($data['cl_1a1_dpp'] ?? 0)
         + ($data['cl_1a2_dpp'] ?? 0)
         + ($data['cl_1a3_dpp'] ?? 0)
         + ($data['cl_1a4_dpp'] ?? 0)
         + ($request['cl_1a5_dpp'] ?? 0)
         + ($data['cl_1a6_dpp'] ?? 0)
         + ($data['cl_1a7_dpp'] ?? 0)
         + ($data['cl_1a8_dpp'] ?? 0)
         + ($request['cl_1a9_dpp'] ?? 0);

        $data['cl_1a_jumlah_ppn'] =
           ($data['cl_1a2_ppn'] ?? 0)
         + ($data['cl_1a3_ppn'] ?? 0)
         + ($request['cl_1a5_ppn'] ?? 0)
         + ($data['cl_1a6_ppn'] ?? 0)
         + ($data['cl_1a7_ppn'] ?? 0)
         + ($data['cl_1a8_ppn'] ?? 0)
         + ($request['cl_1a9_ppn'] ?? 0);

         $data['cl_1a_jumlah_ppnbm'] =
           ($data['cl_1a2_ppnbm'] ?? 0)
         + ($data['cl_1a3_ppnbm'] ?? 0)
         + ($request['cl_1a5_ppnbm'] ?? 0)
         + ($data['cl_1a6_ppnbm'] ?? 0)
         + ($data['cl_1a7_ppnbm'] ?? 0)
         + ($data['cl_1a8_ppnbm'] ?? 0)
         + ($request['cl_1a9_ppnbm'] ?? 0);

        $data['cl_1c_dpp'] = $data['cl_1a_jumlah_dpp'] + ($data['cl_1b_dpp'] ?? 0);

        $data['cl_2g_dpp'] =
           ($data['cl_2a_dpp'] ?? 0)
         + ($data['cl_2b_dpp'] ?? 0)
         + ($data['cl_2c_dpp'] ?? 0)
         + ($data['cl_2d_dpp'] ?? 0);

         $data['cl_2g_ppn'] =
            ($data['cl_2a_ppn'] ?? 0)
         + ($data['cl_2b_ppn'] ?? 0)
         + ($data['cl_2c_ppn'] ?? 0)
         + ($data['cl_2d_ppn'] ?? 0);
         + ($request['cl_2e_ppn'] ?? 0);

         $data['cl_2j_dpp'] = ($data['cl_2g_dpp'] ?? 0 ) + ($request['cl_2h_dpp'] ?? 0 ) + ($request['cl_2i_dpp'] ?? 0 );

         $data['cl_3a_ppn'] = ($data['cl_1a2_ppn'] ?? 0) + ($data['cl_1a3_ppn'] ?? 0) + ($data['cl_1a4_ppn'] ?? 0) + ($request['cl_1a5_ppn'] ?? 0);
         $data['cl_3c_ppn'] = ($data['cl_2g_ppn'] ?? 0);
         $data['cl_3e_ppn'] = ($data['cl_3a_ppn'] ?? 0) - ($request['cl_3b_ppn'] ?? 0) - ($data['cl_3c_ppn'] ?? 0) - ($request['cl_3d_ppn'] ?? 0);
         $data['cl_3g_ppn'] = ($data['cl_3e_ppn'] ?? 0) - ($request['cl_3f_ppn'] ?? 0);

         if ($data['cl_3g_ppn'] < 0){
            $data['cl_3h_diminta_pengembalian'] = '0';
         }

         $cl_4_ppn_terutang_dpp = ($request['cl_4_ppn_terutang_dpp'] ?? 0);
         $data['cl_4_ppn_terutang'] = $cl_4_ppn_terutang_dpp * 0.12;

         $data['cl_6a_ppnbm'] = ($data['cl_1a2_ppnbm'] ?? 0) + ($data['cl_1a3_ppnbm'] ?? 0) + ($data['cl_1a4_ppnbm'] ?? 0) + ($request['cl_1a5_ppnbm'] ?? 0);
         $data['cl_6c_ppnbm'] = ($data['cl_6a_ppnbm'] ?? 0) - ($request['cl_6b_ppnbm'] ?? 0);
         $data['cl_6e_ppnbm'] = ($data['cl_6c_ppnbm'] ?? 0) - ($request['cl_6d_ppnbm'] ?? 0);
         $data['cl_6f_diminta_pengembalian'] = $data['cl_6e_ppnbm'] < 0;

         $data['cl_7c_dpp'] = ($request['cl_7a_dpp'] ?? 0) - ($request['cl_7b_dpp'] ?? 0);
         $data['cl_7c_ppn'] = ($request['cl_7a_ppn'] ?? 0) - ($request['cl_7b_ppn'] ?? 0);
         $data['cl_7c_ppnbm'] = ($request['cl_7a_ppnbm'] ?? 0) - ($request['cl_7b_ppnbm'] ?? 0);
         $data['cl_7c_dpp_lain'] = ($request['cl_7a_dpp_lain'] ?? 0) - ($request['cl_7b_dpp_lain'] ?? 0);

         $data['cl_8c_dpp'] = ($request['cl_8a_dpp'] ?? 0) - ($request['cl_8b_dpp'] ?? 0);
         $data['cl_8c_ppn'] = ($request['cl_8a_ppn'] ?? 0) - ($request['cl_8b_ppn'] ?? 0);
         $data['cl_8c_ppnbm'] = ($request['cl_8a_ppnbm'] ?? 0) - ($request['cl_8b_ppnbm'] ?? 0);
         $data['cl_8c_dpp_lain'] = ($request['cl_8a_dpp_lain'] ?? 0) - ($request['cl_8b_dpp_lain'] ?? 0);

        $data->save();
        //isi sendiri 1a5 1a9 1b 2e 2f 2h 2i 3b 3d 3f 4 5 6b 6d 7a 7b 8 8ba
        //calculate 1c 2g 2j 3g 3h 4 6a 6c 6f 7c 8c
        return $data;
    }

    public function getAllForSpt(Sistem $sistem, int $perPage) {
        $spts = Spt::where('sistem_id', $sistem->id)->paginate($perPage);

        return $spts;
    }

    public function showDetailSpt(Spt $spt) {
        switch ($spt->jenis_pajak) {
            case JenisPajakEnum::PPN->value:
                $spt->load('spt_ppn');
                break;
            case JenisPajakEnum::PPH->value:
                // $spt->load('sptPph21');
                break;
            case JenisPajakEnum::PPH_UNIFIKASI->value:
                // $spt->load('sptPph23');
                break;
            case JenisPajakEnum::PPH_BADAN->value:
                // $spt->load('sptTahunan');
                break;
        }

        return new SptResource($spt);
    }

    public function create(array $data): Model{
        $data['status'] = SptStatusEnum::KONSEP->value;
        $data['is_can_pembetulan'] = false;

        $spt = parent::create($data);

        // $intent = $data['intent'];

        $month = $data['masa_bulan'];
        $year = $data['masa_tahun'];
        $pic = $data['pic_id'];

        switch ($data['jenis_pajak']) {
            case JenisPajakEnum::PPN->value:
                $fakturs = Faktur::where('pic_id', $pic)
                ->where('masa_pajak', $month)
                ->where('tahun', $year)
                ->where('status', FakturStatusEnum::APPROVED->value)
                ->get();

                // $data['cl_1a2_dpp'] dokumen lain

                $fakturs1a2 = $fakturs->whereIn('kode_transaksi', [4, 5]);
                $data_spt_ppn['cl_1a2_dpp']      = $fakturs1a2->sum('dpp');
                $data_spt_ppn['cl_1a2_dpp_lain'] = $fakturs1a2->sum('dpp_lain');
                $data_spt_ppn['cl_1a2_ppn']      = $fakturs1a2->sum('ppn');
                $data_spt_ppn['cl_1a2_ppnbm']    = $fakturs1a2->sum('ppnbm');

                $fakturs1a3 = $fakturs->where('kode_transaksi', 6);
                $data_spt_ppn['cl_1a3_dpp']      = $fakturs1a3->sum('dpp');
                $data_spt_ppn['cl_1a3_dpp_lain'] = $fakturs1a3->sum('dpp_lain');
                $data_spt_ppn['cl_1a3_ppn']      = $fakturs1a3->sum('ppn');
                $data_spt_ppn['cl_1a3_ppnbm']    = $fakturs1a3->sum('ppnbm');

                $fakturs1a4 = $fakturs->whereIn('kode_transaksi', [1, 9, 10]);
                $data_spt_ppn['cl_1a4_dpp']      = $fakturs1a4->sum('dpp');
                $data_spt_ppn['cl_1a4_ppn']      = $fakturs1a4->sum('ppn');
                $data_spt_ppn['cl_1a4_ppnbm']    = $fakturs1a4->sum('ppnbm');

                $fakturs1a6 = $fakturs->whereIn('kode_transaksi', [2, 3]);
                $data_spt_ppn['cl_1a6_dpp']      = $fakturs1a6->sum('dpp');
                $data_spt_ppn['cl_1a6_dpp_lain'] = $fakturs1a6->sum('dpp_lain');
                $data_spt_ppn['cl_1a6_ppn']      = $fakturs1a6->sum('ppn');
                $data_spt_ppn['cl_1a6_ppnbm']    = $fakturs1a6->sum('ppnbm');

                $fakturs1a7 = $fakturs->where('kode_transaksi', 6);
                $data_spt_ppn['cl_1a7_dpp']      = $fakturs1a7->sum('dpp');
                $data_spt_ppn['cl_1a7_dpp_lain'] = $fakturs1a7->sum('dpp_lain');
                $data_spt_ppn['cl_1a7_ppn']      = $fakturs1a7->sum('ppn');
                $data_spt_ppn['cl_1a7_ppnbm']    = $fakturs1a7->sum('ppnbm');

                $fakturs1a8 = $fakturs->where('kode_transaksi', 8);
                $data_spt_ppn['cl_1a8_dpp']      = $fakturs1a8->sum('dpp');
                $data_spt_ppn['cl_1a8_dpp_lain'] = $fakturs1a8->sum('dpp_lain');
                $data_spt_ppn['cl_1a8_ppn']      = $fakturs1a8->sum('ppn');
                $data_spt_ppn['cl_1a8_ppnbm']    = $fakturs1a8->sum('ppnbm');

                // $data_spt_ppn['cl_1a_jumlah_dpp'] =
                //    ($data_spt_ppn['cl_1a1_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_1a2_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_1a3_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_1a4_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_1a5_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_1a6_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_1a7_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_1a8_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_1a9_dpp'] ?? 0);

                // $data_spt_ppn['cl_1a_jumlah_ppn'] =
                //    ($data_spt_ppn['cl_1a2_ppn'] ?? 0)
                //  + ($data_spt_ppn['cl_1a3_ppn'] ?? 0)
                //  + ($data_spt_ppn['cl_1a5_ppn'] ?? 0)
                //  + ($data_spt_ppn['cl_1a6_ppn'] ?? 0)
                //  + ($data_spt_ppn['cl_1a7_ppn'] ?? 0)
                //  + ($data_spt_ppn['cl_1a8_ppn'] ?? 0)
                //  + ($data_spt_ppn['cl_1a9_ppn'] ?? 0);

                //  $data_spt_ppn['cl_1a_jumlah_ppnbm'] =
                //    ($data_spt_ppn['cl_1a2_ppnbm'] ?? 0)
                //  + ($data_spt_ppn['cl_1a3_ppnbm'] ?? 0)
                //  + ($data_spt_ppn['cl_1a5_ppnbm'] ?? 0)
                //  + ($data_spt_ppn['cl_1a6_ppnbm'] ?? 0)
                //  + ($data_spt_ppn['cl_1a7_ppnbm'] ?? 0)
                //  + ($data_spt_ppn['cl_1a8_ppnbm'] ?? 0)
                //  + ($data_spt_ppn['cl_1a9_ppnbm'] ?? 0);

                // $data_spt_ppn['cl_1c_dpp'] = $data_spt_ppn['cl_1a_jumlah_dpp'] + ($data_spt_ppn['cl_1b_dpp'] ?? 0);

                $faktursMasukan = Faktur::where('akun_penerima_id', $data['sistem_id'])
                    ->where('masa_pajak', $month)
                    ->where('tahun', $year)
                    ->where('status', FakturStatusEnum::APPROVED->value)
                    ->get();

                $fakturs2b = $faktursMasukan->whereIn('kode_transaksi', [4, 5]);
                $data_spt_ppn['cl_2b_dpp']      = $fakturs2b->sum('dpp');
                $data_spt_ppn['cl_2b_dpp_lain'] = $fakturs2b->sum('dpp_lain');
                $data_spt_ppn['cl_2b_ppn']      = $fakturs2b->sum('ppn');
                $data_spt_ppn['cl_2b_ppnbm']    = $fakturs2b->sum('ppnbm');

                $fakturs2c = $faktursMasukan->whereIn('kode_transaksi', [1, 9, 10]);
                $data_spt_ppn['cl_2c_dpp']      = $fakturs2c->sum('dpp');
                $data_spt_ppn['cl_2c_ppn']      = $fakturs2c->sum('ppn');
                $data_spt_ppn['cl_2c_ppnbm']    = $fakturs2c->sum('ppnbm');

                $fakturs2d = $faktursMasukan->whereIn('kode_transaksi', [2, 3]);
                $data_spt_ppn['cl_2d_dpp']      = $fakturs2d->sum('dpp');
                $data_spt_ppn['cl_2d_dpp_lain'] = $fakturs2d->sum('dpp_lain');
                $data_spt_ppn['cl_2d_ppn']      = $fakturs2d->sum('ppn');
                $data_spt_ppn['cl_2d_ppnbm']    = $fakturs2d->sum('ppnbm');

                //  $data_spt_ppn['cl_2g_dpp'] =
                //    ($data_spt_ppn['cl_2a_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_2b_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_2c_dpp'] ?? 0)
                //  + ($data_spt_ppn['cl_2d_dpp'] ?? 0);

                //  $data_spt_ppn['cl_2g_ppn'] =
                //     ($data_spt_ppn['cl_2a_ppn'] ?? 0)
                //  + ($data_spt_ppn['cl_2b_ppn'] ?? 0)
                //  + ($data_spt_ppn['cl_2c_ppn'] ?? 0)
                //  + ($data_spt_ppn['cl_2d_ppn'] ?? 0);
                //  + ($data_spt_ppn['cl_2e_ppn'] ?? 0);

                //  $data_spt_ppn['cl_2j_dpp'] = ($data_spt_ppn['cl_2g_dpp'] ?? 0 ) + ($data_spt_ppn['cl_2h_dpp'] ?? 0 ) + ($data_spt_ppn['cl_2i_dpp'] ?? 0 );

                //  $data_spt_ppn['cl_3a_ppn'] = ($data_spt_ppn['cl_1a2_ppn'] ?? 0) + ($data_spt_ppn['cl_1a3_ppn'] ?? 0) + ($data_spt_ppn['cl_1a4_ppn'] ?? 0) + ($data_spt_ppn['cl_1a5_ppn'] ?? 0);
                //  $data_spt_ppn['cl_3c_ppn'] = ($data_spt_ppn['cl_2g_ppn'] ?? 0);
                //  $data_spt_ppn['cl_3e_ppn'] = ($data_spt_ppn['cl_3a_ppn'] ?? 0) - ($data_spt_ppn['cl_3b_ppn'] ?? 0) - ($data_spt_ppn['cl_3c_ppn'] ?? 0) - ($data_spt_ppn['cl_3c_ppn'] ?? 0);
                //  $data_spt_ppn['cl_3g_ppn'] = ($data_spt_ppn['cl_3e_ppn'] ?? 0) - ($data_spt_ppn['cl_3f_ppn'] ?? 0);

                //  $cl_4_ppn_terutang_dpp = ($data_spt_ppn['cl_4_ppn_terutang_dpp'] ?? 0);
                //  $data_spt_ppn['cl_4_ppn_terutang'] = $cl_4_ppn_terutang_dpp * 0.12;

                //  $data_spt_ppn['cl_6a_ppnbm'] = ($data_spt_ppn['cl_1a2_ppnbm'] ?? 0) + ($data_spt_ppn['cl_1a3_ppnbm'] ?? 0) + ($data_spt_ppn['cl_1a4_ppnbm'] ?? 0) + ($data_spt_ppn['cl_1a5_ppnbm'] ?? 0);
                //  $data_spt_ppn['cl_6c_ppnbm'] = ($data_spt_ppn['cl_6a_ppnbm'] ?? 0) - ($data_spt_ppn['cl_6b_ppnbm'] ?? 0);
                //  $data_spt_ppn['cl_6e_ppnbm'] = ($data_spt_ppn['cl_6c_ppnbm'] ?? 0) - ($data_spt_ppn['cl_6d_ppnbm'] ?? 0);
                //  $data_spt_ppn['cl_6f_diminta_pengembalian'] = $data_spt_ppn['cl_6e_ppnbm'] < 0;

                //  $data_spt_ppn['cl_7c_dpp'] = ($data_spt_ppn['cl_7a_dpp'] ?? 0) - ($data_spt_ppn['cl_7b_dpp'] ?? 0);
                //  $data_spt_ppn['cl_7c_ppn'] = ($data_spt_ppn['cl_7a_ppn'] ?? 0) - ($data_spt_ppn['cl_7b_ppn'] ?? 0);
                //  $data_spt_ppn['cl_7c_ppnbm'] = ($data_spt_ppn['cl_7a_ppnbm'] ?? 0) - ($data_spt_ppn['cl_7b_ppnbm'] ?? 0);
                //  $data_spt_ppn['cl_7c_dpp_lain'] = ($data_spt_ppn['cl_7a_dpp_lain'] ?? 0) - ($data_spt_ppn['cl_7b_dpp_lain'] ?? 0);

                //  $data_spt_ppn['cl_8c_dpp'] = ($data_spt_ppn['cl_8a_dpp'] ?? 0) - ($data_spt_ppn['cl_8b_dpp'] ?? 0);
                //  $data_spt_ppn['cl_8c_ppn'] = ($data_spt_ppn['cl_8a_ppn'] ?? 0) - ($data_spt_ppn['cl_8b_ppn'] ?? 0);
                //  $data_spt_ppn['cl_8c_ppnbm'] = ($data_spt_ppn['cl_8a_ppnbm'] ?? 0) - ($data_spt_ppn['cl_8b_ppnbm'] ?? 0);
                //  $data_spt_ppn['cl_8c_dpp_lain'] = ($data_spt_ppn['cl_8a_dpp_lain'] ?? 0) - ($data_spt_ppn['cl_8b_dpp_lain'] ?? 0);
                // dd($data_spt_ppn);

                $data_spt_ppn['spt_id'] = $spt->id;
                $spt_ppn = SptPpn::create($data_spt_ppn);

                Faktur::where('pic_id', $pic)
                    ->where('masa_pajak', $month)
                    ->where('tahun', $year)
                    ->where('status', FakturStatusEnum::APPROVED->value)
                    ->update(['spt_id' => $spt->id]);

                Faktur::where('akun_penerima_id', $data['sistem_id'])
                    ->where('masa_pajak', $month)
                    ->where('tahun', $year)
                    ->where('status', FakturStatusEnum::APPROVED->value)
                    ->update(['spt_id' => $spt->id]);

                break;
        }
        return $spt;
    }

    public function authorizeAccess(Assignment $assignment, Sistem $sistem): void
    {
        $assignmentUser = AssignmentUser::where([
            'user_id' => Auth::id(),
            'assignment_id' => $assignment->id
        ])->firstOrFail();

        if ($sistem->assignment_user_id !== $assignmentUser->id) {
            abort(403, 'Unauthorized access to this sistem');
        }
        // Verify the sistem exists for this assignment user
        Sistem::where('assignment_user_id', $assignmentUser->id)
        ->where('id', $sistem->id)
        ->firstOrFail();
    }

    public function checkPeriode(Assignment $assignment, Sistem $sistem, Request $request) {
        $this->authorizeAccess($assignment, $sistem);

        $picId = $request->query('pic_id');
        $bulan = $request->query('masa_bulan');
        $tahun = $request->query('masa_tahun');
        $jenis_pajak = $request->query('jenis_pajak');

        $pic = Pic::where('id', $picId)->first();
        if (!$pic) {
            abort(404, 'Belum ada PIC');
        }

        $picId = $pic->id;

        $check = Spt::where('pic_id', $picId)
                       ->where('jenis_pajak', $jenis_pajak)
                       ->where('masa_bulan', $bulan)
                       ->where('masa_tahun', $tahun)
                       ->first();

        if (empty($check)) {
            return [
                //alur normal
                'masa_bulan' => $bulan,
                'masa_tahun' => $tahun,
                'jenis_pajak' => $jenis_pajak,
                'model' => SptModelEnum::NORMAL->value,
            ];
        }else {
            if (!$check->is_can_pembetulan) {
                return response()->json([
                    'message' => 'Spt masih draft',
                    'code' => 101,
                ]);
            }else {
                //alur pembetulan
                return [
                    'model' => SptModelEnum::PEMBETULAN->value,
                    'checkId' => $check->id,
                ];
            }
        }
    }
}
