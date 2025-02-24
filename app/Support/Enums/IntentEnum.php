<?php

namespace App\Support\Enums;

enum IntentEnum: string {

    case API_USER_CREATE_ADMIN = 'api.user.create.admin';

    case API_USER_IMPORT_DOSEN = 'api.user.import.dosen';

    case API_USER_IMPORT_MAHASISWA_PSC = 'api.user.import.mahasiswa.psc';

    case API_USER_CREATE_INSTRUCTOR = 'api.user.create.instructor';

    case API_USER_CREATE_GROUP = 'api.user.create.group';

    case API_USER_CREATE_ASSIGNMENT = 'api.user.create.assignment';

    case API_USER_JOIN_GROUP = 'api.user.join.group';

    case API_USER_CREATE_EXAM = 'api.user.create.exam';

    case API_USER_JOIN_EXAM = 'api.user.join.exam';

    case API_USER_JOIN_ASSIGNMENT = 'api.user.assign.task';

    case API_USER_GET_PSC = 'api.user.get.psc';

    case API_USER_GET_ADMIN = 'api.user.get.admin';

    case API_USER_GET_DOSEN = 'api.user.get.dosen';

    case API_USER_GET_MAHASISWA = 'api.user.get.mahasiswa';

    case API_USER_GET_MAHASISWA_PSC = 'api.user.get.mahasiswa.psc';

    case API_USER_GET_INSTRUKTUR = 'api.user.get.instruktur';

    case API_USER_DOWNLOAD_SOAL = 'api.user.download.soal';

    case API_USER_DOWNLOAD_FILE = 'api.user.download.file';

    case API_GET_GROUP_WITH_ASSIGNMENTS = 'api.get.group.with.assignments';

    case API_GET_GROUP_WITH_MEMBERS = 'api.get.group.with.members';
}
