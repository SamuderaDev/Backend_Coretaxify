<?php

namespace App\Support\Enums;

enum IntentEnum: string {

    case API_USER_CREATE_ADMIN = 'api.user.create.admin';

    case API_USER_CREATE_PSC = 'api.user.create.psc';

    case API_USER_CREATE_MAHASISWA_PSC = 'api.user.create.mahasiswa.psc';

    case API_USER_CREATE_INSTRUKTUR = 'api.user.create.instruktur';

    case API_USER_GET_PSC = 'api.user.get.psc';

    case API_USER_GET_ADMIN = 'api.user.get.admin';

    case API_USER_GET_DOSEN = 'api.user.get.dosen';

    case API_USER_GET_MAHASISWA = 'api.user.get.mahasiswa';

    case API_USER_GET_MAHASISWA_PSC = 'api.user.get.mahasiswa.psc';

    case API_USER_GET_INSTRUKTUR = 'api.user.get.instruktur';

    case API_USER_IMPORT_DOSEN = 'api.user.import.dosen';

    case API_USER_IMPORT_MAHASISWA_PSC = 'api.user.import.mahasiswa.psc';

    case API_USER_IMPORT_INSTRUKTUR = 'api.user.import.instruktur';

    case API_USER_CREATE_GROUP = 'api.user.create.group';

    case API_USER_JOIN_GROUP = 'api.user.join.group';

    case API_USER_CREATE_ASSIGNMENT = 'api.user.create.assignment';

    case API_USER_JOIN_ASSIGNMENT = 'api.user.assign.task';

    case API_USER_CREATE_EXAM = 'api.user.create.exam';

    case API_USER_JOIN_EXAM = 'api.user.join.exam';

    case API_GET_GROUP_ALL = 'api.get.group.all';

    case API_GET_ASSIGNMENT_ALL = 'api.get.assignment.all';

    case API_GET_GROUP_WITH_ASSIGNMENTS = 'api.get.group.with.assignments';

    case API_GET_GROUP_WITH_MEMBERS = 'api.get.group.with.members';

    case API_GET_GROUP_BY_ROLES = 'api.get.group.by.roles';

    case API_GET_EXAM_BY_ROLES = 'api.get.exam.by.roles';

    case API_USER_DOWNLOAD_SOAL = 'api.user.download.soal';

    case API_USER_DOWNLOAD_FILE = 'api.user.download.file';

    case API_USER_UPDATE_KUASA_WAJIB = 'api.user.update.kuasa.wajib';

    case API_SISTEM_GET_AKUN_ORANG_PIBADI = 'api.sistem.get.akun.orang.pibadi';

    case API_GET_SISTEM_ALAMAT = 'api.get.sistem.alamat';

    case API_SISTEM_GET_PROFIL_SAYA = 'api.sistem.get.profil.saya';

    case API_GET_KUASA_WAJIB_SAYA = 'api.get.kuasa.wajib.saya';

    case API_GET_ASSIGNMENT_USER_PIC = 'api.get.assignment.user.pic';

    case API_GET_SISTEM_FIRST_ACCOUNT = 'api.get.sistem.first.account';

    case API_GET_SISTEM_INFORMASI_UMUM = 'api.get.sistem.informasi.umum';

    case API_GET_SISTEM_IKHTISAR_PROFIL = 'api.get.sistem.ikhtisar.profil';

    case API_GET_SISTEM_INFORMASI_UMUM_ORANG_PRIBADI = 'api.get.sistem.informasi.umum.orang.pribadi';

    case API_GET_SISTEM_INFORMASI_UMUM_BADAN = 'api.get.sistem.informasi.umum.badan';

    case API_UPDATE_SISTEM_INFORMASI_UMUM_BADAN = 'api.update.sistem.informasi.umum.badan';

    case API_UPDATE_SISTEM_INFORMASI_UMUM_ORANG_PRIBADI = 'api.update.sistem.informasi.umum.orang.pribadi';

    case API_GET_SISTEM_DATA_EKONOMI_ORANG_PRIBADI = 'api.get.sistem.data.ekonomi.orang.pribadi';

    case API_GET_SISTEM_DATA_EKONOMI_BADAN = 'api.get.sistem.data.ekonomi.badan';

    case API_GET_SISTEM_EDIT_INFORMASI_UMUM = 'api.get.sistem.edit.informasi.umum';

    case API_CREATE_FAKTUR_DRAFT = 'api.create.faktur.draft';

    case API_CREATE_FAKTUR_FIX = 'api.create.faktur.fix';

    case API_GET_FAKTUR_PENGIRIM = 'api.get.faktur.pengirim';

    case API_GET_FAKTUR_PENERIMA = 'api.get.faktur.penerima';
}
