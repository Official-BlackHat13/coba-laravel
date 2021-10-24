<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Teacher;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    protected $mapel = [
        ["id" => 'Ing-X', "nama_mapel" => 'Bahasa Inggris', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => '0021.023'],
        ["id" => 'Senbud-X', "nama_mapel" => 'Seni Budaya', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => '0021.021'],
        ["id" => 'PKN-X', "nama_mapel" => 'Pendidikan Pancasila & Kewarganegaraan', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => '0021.15'],
        ["id" => 'Sejarah-X', "nama_mapel" => 'Sejarah Indonesia', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => '0021.065'],
        ["id" => 'Bali-X', "nama_mapel" => 'Bahasa Bali', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => '0021.069'],
        ["id" => 'Simkomdig-X', "nama_mapel" => 'Simulasi & Komunikasi Digital', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'Hin-X', "nama_mapel" => 'Pendidikan Agama Hindu & Budi Pekerti', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'Isl-X', "nama_mapel" => 'Pendidikan Agama Islam & Budi Pekerti', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'Kris-X', "nama_mapel" => 'Pendidikan Agama Kristen & Budi Pekerti', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'Bud-X', "nama_mapel" => 'Pendidikan Agama Budha & Budi Pekerti', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'Kong-X', "nama_mapel" => 'Pendidikan Agama Konghuchu & Budi Pekerti', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'Mtk-X-1', "nama_mapel" => 'Matematika', "kelas" => ['xrpl1','xmm1','xmm2'], "teacher_id" => ''],
        ["id" => 'Mtk-X-2', "nama_mapel" => 'Matematika', "kelas" => ['xrpl2','xrpl3','xtkj1','xtkj2','xtkj3','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'Indo-X-1', "nama_mapel" => 'Bahasa Indonesia', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3'], "teacher_id" => ''],
        ["id" => 'Indo-X-2', "nama_mapel" => 'Bahasa Indonesia', "kelas" => ['xmm1','xmm2','xmm3','xmm4','xmm5','xmm6','xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'D3G-X', "nama_mapel" => 'Dasar Dasar Desain Grafis', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3', 'xmm1','xmm2','xmm3','xmm4','xmm5','xmm6'], "teacher_id" => ''],
        ["id" => 'Komjar-X', "nama_mapel" => 'Komputer & Jaringan Dasar', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3', 'xmm1','xmm2','xmm3','xmm4','xmm5','xmm6'], "teacher_id" => ''],
        ["id" => 'Fisika-X', "nama_mapel" => 'Fisika', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3', 'xmm1','xmm2','xmm3','xmm4','xmm5','xmm6'], "teacher_id" => ''],
        ["id" => 'Kimia-X', "nama_mapel" => 'Kimia', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3', 'xmm1','xmm2','xmm3','xmm4','xmm5','xmm6'], "teacher_id" => ''],
        ["id" => 'Siskom-X', "nama_mapel" => 'Sistem Komputer', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3', 'xmm1','xmm2','xmm3','xmm4','xmm5','xmm6'], "teacher_id" => ''],
        ["id" => 'PJOK-X', "nama_mapel" => 'Penjasorkes', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3', 'xmm1','xmm2','xmm3','xmm4','xmm5','xmm6'], "teacher_id" => ''],
        ["id" => 'Gmbr-X', "nama_mapel" => 'Gambar', "kelas" => ['xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'D2K-X', "nama_mapel" => 'Dasar Dasar Kreatifitas', "kelas" => ['xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'D2SR-X', "nama_mapel" => 'Dasar Dasar Seni Rupa', "kelas" => ['xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'Sketsa-X', "nama_mapel" => 'Sketsa', "kelas" => ['xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'TS-X', "nama_mapel" => 'Tinjauan Seni', "kelas" => ['xan', 'xdkv'], "teacher_id" => ''],
        ["id" => 'Pemdas-X', "nama_mapel" => 'Pemrograman Dasar', "kelas" => ['xrpl1','xrpl2','xrpl3', 'xtkj1','xtkj2','xtkj3','xmm1','xmm2','xmm3','xmm4','xmm5','xmm6'], "teacher_id" => ''],
        ["id" => 'Indo-XI-1', "nama_mapel" => 'Bahasa Indonesia', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3'], "teacher_id" => ''],
        ["id" => 'Indo-XI-2', "nama_mapel" => 'Bahasa Indonesia', "kelas" => ['ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'MTK-XI-1', "nama_mapel" => 'Matematika', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3'], "teacher_id" => ''],
        ["id" => 'MTK-XI-2', "nama_mapel" => 'Matematika', "kelas" => ['ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'PKN-XI', "nama_mapel" => 'Pendidikan Pancasila & Kewarganegaraan', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3','ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'Bali-XI', "nama_mapel" => 'Bahasa Bali', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3','ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'Ing-XI', "nama_mapel" => 'Bahasa Inggris', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3','ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'Database-XI', "nama_mapel" => 'Basis Data', "kelas" => ['xirpl1','xirpl2','xirpl3'], "teacher_id" => ''],
        ["id" => 'TLJ-XI', "nama_mapel" => 'TLJ', "kelas" => ['xitkj1','xitkj2','xitkj3'], "teacher_id" => ''],
        ["id" => 'DPub-XI', "nama_mapel" => 'Desain Publikasi', "kelas" => ['xidkv'], "teacher_id" => ''],
        ["id" => 'An2D-XI', "nama_mapel" => 'Animasi 2D', "kelas" => ['xian'], "teacher_id" => ''],
        ["id" => 'PWeb-XI', "nama_mapel" => 'Pemrograman Web & Perangkat Bergerak', "kelas" => ['xirpl1','xirpl2','xirpl3'], "teacher_id" => ''],
        ["id" => 'ASJ-XI', "nama_mapel" => 'ASJ', "kelas" => ['xitkj1','xitkj2','xitkj3'], "teacher_id" => ''],
        ["id" => 'An23-XI', "nama_mapel" => 'Teknik Animasi 2D & 3D', "kelas" => ['ximm1','ximm2','ximm3','ximm4','ximm5','ximm6'], "teacher_id" => ''],
        ["id" => 'KomGraf-XI', "nama_mapel" => 'Komputer Grafis', "kelas" => ['xidkv'], "teacher_id" => ''],
        ["id" => 'ProDig-XI', "nama_mapel" => 'Proses Digital', "kelas" => ['xian'], "teacher_id" => ''],
        ["id" => 'PBO-XI', "nama_mapel" => 'Pemrograman Berorientasi Objek', "kelas" => ['xirpl1','xirpl2','xirpl3'], "teacher_id" => ''],
        ["id" => 'AIJ-XI', "nama_mapel" => 'AIJ', "kelas" => ['xitkj1','xitkj2','xitkj3'], "teacher_id" => ''],
        ["id" => 'DGP-XI', "nama_mapel" => 'Desain Grafis & Percetakan', "kelas" => ['ximm1','ximm2','ximm3','ximm4','ximm5','ximm6'], "teacher_id" => ''],
        ["id" => 'Foto-XI', "nama_mapel" => 'Fotografi', "kelas" => ['xidkv'], "teacher_id" => ''],
        ["id" => 'An3D-XI', "nama_mapel" => 'Animasi 3D', "kelas" => ['xian'], "teacher_id" => ''],
        ["id" => 'PJOK-XI', "nama_mapel" => 'Penjasorkes', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3','ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'PKWU-XI', "nama_mapel" => 'Produk Kreatif & Kewirausahaan', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3','ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'Hin-XI', "nama_mapel" => 'Pendidikan Agama Hindu & Budi Pekerti', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3','ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'Isl-XI', "nama_mapel" => 'Pendidikan Agama Islam & Budi Pekerti', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3','ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'Kris-XI', "nama_mapel" => 'Pendidikan Agama Kristen & Budi Pekerti', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3','ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'Bud-XI', "nama_mapel" => 'Pendidikan Agama Budha & Budi Pekerti', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3','ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'Kong-XI', "nama_mapel" => 'Pendidikan Agama Konghuchu & Budi Pekerti', "kelas" => ['xirpl1','xirpl2','xirpl3', 'xitkj1','xitkj2','xitkj3','ximm1','ximm2','ximm3','ximm4','ximm5','ximm6','xian', 'xidkv'], "teacher_id" => ''],
        ["id" => 'PML-XI', "nama_mapel" => 'Pemodelan Perangkat Lunak', "kelas" => ['xirpl1','xirpl2','xirpl3'], "teacher_id" => ''],
        ["id" => 'WAN-XI', "nama_mapel" => 'Teknologi WAN', "kelas" => ['xitkj1','xitkj2','xitkj3'], "teacher_id" => ''],
        ["id" => 'Video-XI', "nama_mapel" => 'Videografi', "kelas" => ['xian','xidkv'], "teacher_id" => ''],
        ["id" => 'Indo-XII-1', "nama_mapel" => 'Bahasa Indonesia', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3'], "teacher_id" => ''],
        ["id" => 'Indo-XII-2', "nama_mapel" => 'Bahasa Indonesia', "kelas" => ['xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'MTK-XII-1', "nama_mapel" => 'Matematika', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3'], "teacher_id" => ''],
        ["id" => 'MTK-XII-2', "nama_mapel" => 'Matematika', "kelas" => ['xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'PKN-XII', "nama_mapel" => 'Pendidikan Pancasila & Kewarganegaraan', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3','xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'Bali-XII', "nama_mapel" => 'Bahasa Bali', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3','xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'Ing-XII', "nama_mapel" => 'Bahasa Inggris', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3','xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'Database-XII', "nama_mapel" => 'Basis Data', "kelas" => ['xiirpl1','xiirpl2','xiirpl3'], "teacher_id" => ''],
        ["id" => 'TLJ-XII', "nama_mapel" => 'TLJ', "kelas" => ['xiitkj1','xiitkj2','xiitkj3'], "teacher_id" => ''],
        ["id" => 'DPub-XII', "nama_mapel" => 'Desain Publikasi', "kelas" => ['xiidkv'], "teacher_id" => ''],
        ["id" => 'An2D-XII', "nama_mapel" => 'Animasi 2D', "kelas" => ['xiian'], "teacher_id" => ''],
        ["id" => 'PWeb-XII', "nama_mapel" => 'Pemrograman Web & Perangkat Bergerak', "kelas" => ['xiirpl1','xiirpl2','xiirpl3'], "teacher_id" => ''],
        ["id" => 'ASJ-XII', "nama_mapel" => 'ASJ', "kelas" => ['xiitkj1','xiitkj2','xiitkj3'], "teacher_id" => ''],
        ["id" => 'DMI-XII', "nama_mapel" => 'Desain Media Interaktif', "kelas" => ['xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6'], "teacher_id" => ''],
        ["id" => 'KomGraf-XII', "nama_mapel" => 'Komputer Grafis', "kelas" => ['xiidkv'], "teacher_id" => ''],
        ["id" => 'ProDig-XII', "nama_mapel" => 'Proses Digital', "kelas" => ['xiian'], "teacher_id" => ''],
        ["id" => 'PBO-XII', "nama_mapel" => 'Pemrograman Berorientasi Objek', "kelas" => ['xiirpl1','xiirpl2','xiirpl3'], "teacher_id" => ''],
        ["id" => 'AIJ-XII', "nama_mapel" => 'AIJ', "kelas" => ['xiitkj1','xiitkj2','xiitkj3'], "teacher_id" => ''],
        ["id" => 'TPAV-XII', "nama_mapel" => 'Teknik Pengolahan Video & Audio', "kelas" => ['xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6'], "teacher_id" => ''],
        ["id" => 'Foto-XII', "nama_mapel" => 'Fotografi', "kelas" => ['xiidkv'], "teacher_id" => ''],
        ["id" => 'An3D-XII', "nama_mapel" => 'Animasi 3D', "kelas" => ['xiian'], "teacher_id" => ''],
        ["id" => 'PKWU-XII', "nama_mapel" => 'Produk Kreatif & Kewirausahaan', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3','xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'Hin-XII', "nama_mapel" => 'Pendidikan Agama Hindu & Budi Pekerti', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3','xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'Isl-XII', "nama_mapel" => 'Pendidikan Agama Islam & Budi Pekerti', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3','xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'Kris-XII', "nama_mapel" => 'Pendidikan Agama Kristen & Budi Pekerti', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3','xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'Bud-XII', "nama_mapel" => 'Pendidikan Agama Budha & Budi Pekerti', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3','xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'Kong-XII', "nama_mapel" => 'Pendidikan Agama Konghuchu & Budi Pekerti', "kelas" => ['xiirpl1','xiirpl2','xiirpl3', 'xiitkj1','xiitkj2','xiitkj3','xiimm1','xiimm2','xiimm3','xiimm4','xiimm5','xiimm6','xiian', 'xiidkv'], "teacher_id" => ''],
        ["id" => 'Video-XII', "nama_mapel" => 'Videografi', "kelas" => ['xiidkv'], "teacher_id" => ''],
    ];

    private $increment = 0;
    private $decrement = 90;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $teacher_id = '';
        if ($this->decrement < 10) {
            $teacher_id = '0021.00'.$this->decrement;
        }
        elseif ($this->decrement < 100) {
            $teacher_id = '0021.0'.$this->decrement;
        }
        else {
            $teacher_id = '0021.'.$this->decrement;
        }
        $this->increment += 1;
        $this->decrement -= 1;
        return [
            'mapel_id' => $this->mapel[$this->increment]["id"],
            'nama_mapel' => $this->mapel[$this->increment]["nama_mapel"],
            'kelas' => json_encode($this->mapel[$this->increment]["kelas"]),
            'teacher_id' => $teacher_id,
        ];
    }
}
