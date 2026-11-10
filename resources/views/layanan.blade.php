@extends('layouts.app')

@section('content')

<style>
    :root {
        --primary-color: #3c074b;
        --secondary-color: #007bff;
        --accent-color: #3c074b;
        --dark-color: #343a40;
        --light-bg: #f4f7f9;
        --white-color: #ffffff;
        --shadow-light: 0 4px 15px rgba(0, 0, 0, 0.08);
        --shadow-medium: 0 8px 25px rgba(0, 0, 0, 0.12);
        --shadow-strong: 0 15px 40px rgba(0, 0, 0, 0.25);

        --color-primary-dark: #3c074b;
        --color-primary-light: #9d4db4;
        --color-accent-gold: #3c074b;
        --color-text-dark: #2c3e50;
        --color-text-muted: #7f8c8d;
        --color-background-light: #f8f9fa;
        --color-white: #ffffff;
        --color-card-border: rgba(0, 0, 0, 0.08);

        --border-radius-lg: 1.25rem;
        --border-radius-md: 1rem;
        --border-radius-sm: 0.6rem;

        --color-gradient-start: #3c074b;
        --color-gradient-end: #6a0572;
        --color-secondary-success: #28a745;
    }

    body {
        font-family: 'Montserrat', sans-serif;
        background-color: var(--color-background-light);
        color: var(--color-text-dark);
        line-height: 1.7;
    }

    h1, h2, h3, h4, h5, h6 {
        font-family: 'Playfair Display', serif;
        color: var(--color-primary-dark);
        font-weight: 700;
        line-height: 1.2;
    }

    .section-header {
        position: relative;
        padding-bottom: 25px;
        margin-bottom: 4rem;
        font-weight: 700;
        color: var(--color-primary-dark);
        text-align: center;
        margin-top: 2rem;
    }

    .section-header h2 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--color-primary-dark);
        font-size: 3.8rem;
        display: inline-flex;
        align-items: center;
        gap: 20px;
        position: relative;
        padding-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .section-header h2::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 150px;
        height: 6px;
        background-color: var(--color-accent-gold);
        border-radius: 3px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    }

    .section-header p {
        font-size: 1.3rem;
        color: var(--color-text-muted);
        max-width: 900px;
        margin: 1.8rem auto 0 auto;
        line-height: 1.8;
    }

    .service-card {
        transition: transform 0.4s ease, box-shadow 0.4s ease, background 0.4s ease;
        border-radius: var(--border-radius-lg);
        overflow: hidden;
        border: none;
        box-shadow: var(--shadow-medium);
        background: linear-gradient(145deg, var(--white-color) 0%, #fcfcfc 100%);
        padding: 3rem;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        min-height: 380px;
        position: relative;
        overflow: hidden;
    }

    .service-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 8px;
        background: linear-gradient(90deg, var(--color-primary-light) 0%, var(--color-accent-gold) 100%);
        transition: height 0.3s ease;
    }

    .service-card:hover {
        transform: translateY(-15px);
        box-shadow: var(--shadow-strong);
        background: linear-gradient(145deg, #fefefe 0%, var(--light-bg) 100%);
    }

    .service-card:hover::before {
        height: 12px;
    }

    .service-icon {
        font-size: 4.5rem;
        color: var(--color-accent-gold);
        margin-bottom: 2rem;
        animation: bounceIn 1s ease-out;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 1;
    }

    @keyframes bounceIn {
        0% { transform: scale(0.3); opacity: 0; }
        50% { transform: scale(1.1); opacity: 1; }
        70% { transform: scale(0.9); }
        100% { transform: scale(1); }
    }

    .service-card h4 {
        font-family: 'Playfair Display', serif;
        font-weight: 700;
        color: var(--color-primary-dark);
        font-size: 2.2rem;
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 10px;
    }

    .service-card h4::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        width: 50px;
        height: 3px;
        background-color: var(--color-primary-light);
        border-radius: 1.5px;
    }

    .service-card p {
        color: var(--color-text-dark);
        font-size: 1.1rem;
        line-height: 1.8;
        flex-grow: 1;
        margin-bottom: 1.5rem;
        text-align: justify;
    }

    .service-card p:last-of-type {
        margin-bottom: 0;
    }

    @media (max-width: 991px) {
        .section-header h2 {
            font-size: 3rem;
            gap: 15px;
        }
        .section-header h2::after {
            width: 120px;
            height: 5px;
        }
        .section-header p {
            font-size: 1.15rem;
            margin: 1.2rem auto 0 auto;
        }
        .service-card {
            padding: 2.5rem;
            min-height: 350px;
        }
        .service-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
        }
        .service-card h4 {
            font-size: 1.9rem;
            margin-bottom: 1rem;
        }
        .service-card p {
            font-size: 1rem;
            margin-bottom: 1rem;
        }
    }

    @media (max-width: 768px) {
        .section-header h2 {
            font-size: 2.5rem;
            gap: 10px;
        }
        .section-header h2::after {
            width: 100px;
            height: 4px;
        }
        .section-header p {
            font-size: 1rem;
        }
        .service-card {
            padding: 2rem;
            min-height: auto;
        }
        .service-card::before {
            height: 6px;
        }
        .service-card:hover::before {
            height: 10px;
        }
        .service-icon {
            font-size: 3.5rem;
            margin-bottom: 1.2rem;
        }
        .service-card h4 {
            font-size: 1.6rem;
            margin-bottom: 0.8rem;
        }
        .service-card p {
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 0.8rem;
        }
    }

    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;700&display=swap');
</style>

<div class="row mt-5">
    <div class="col-lg-12">
        <div class="section-header" style="margin-top: 40px;">
            <h2>
                <i class="fas fa-hand-holding-heart"></i> Layanan Kami yang Berdedikasi
            </h2>
            <p>
                Di Kit Kat LITE Petshop and Petcare, kami berkomitmen untuk menyediakan perawatan komprehensif dan penuh kasih
                sayang untuk hewan peliharaan kesayangan Anda. Dengan tim profesional yang berpengalaman dan fasilitas modern,
                kami memastikan setiap kunjungan menjadi pengalaman yang positif dan bermanfaat bagi kesehatan serta kebahagiaan hewan Anda.
                Berikut adalah beberapa layanan unggulan kami yang dirancang untuk memenuhi setiap kebutuhan hewan peliharaan Anda:
            </p>
        </div>
    </div>
</div>

<div class="row g-4 justify-content-center">
    <div class="col-md-6 col-lg-4">
        <div class="service-card">
            <i class="fas fa-syringe service-icon"></i>
            <h4>Vaksinasi & Pencegahan Penyakit</h4>
            <p>
                Kami menyediakan program vaksinasi lengkap yang disesuaikan dengan kebutuhan individu hewan peliharaan Anda,
                melindungi mereka dari berbagai penyakit menular yang berbahaya. Selain itu, kami juga menawarkan konsultasi
                komprehensif mengenai langkah-langkah pencegahan, termasuk kontrol parasit dan edukasi gaya hidup sehat,
                untuk menjaga kekebalan tubuh dan vitalitas hewan kesayangan Anda sepanjang waktu.
            </p>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="service-card">
            <i class="fas fa-stethoscope service-icon"></i>
            <h4>Pemeriksaan Kesehatan Rutin</h4>
            <p>
                Pemeriksaan kesehatan menyeluruh secara berkala adalah kunci untuk deteksi dini masalah kesehatan dan
                pencegahan komplikasi serius. Tim dokter hewan kami akan melakukan evaluasi fisik lengkap, memberikan
                saran nutrisi yang tepat, serta membahas setiap kekhawatiran yang mungkin Anda miliki. Ini adalah fondasi
                penting untuk memastikan hewan peliharaan Anda tumbuh sehat dan bahagia.
            </p>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="service-card">
            <i class="fas fa-cut service-icon"></i>
            <h4>Grooming & Spa Hewan Peliharaan</h4>
            <p>
                Manjakan hewan peliharaan Anda dengan layanan grooming profesional kami yang dirancang untuk menjaga
                kebersihan, kesehatan kulit, dan penampilan mereka. Mulai dari mandi dengan sampo khusus, potong kuku,
                pembersihan telinga, hingga perawatan bulu yang disesuaikan dengan jenis ras, kami memastikan hewan Anda
                pulang dalam kondisi bersih, harum, dan merasa nyaman.
            </p>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="service-card">
            <i class="fas fa-x-ray service-icon"></i>
            <h4>Diagnostik Lanjut & Laboratorium</h4>
            <p>
                Untuk diagnosis yang akurat dan cepat, kami dilengkapi dengan fasilitas diagnostik modern. Ini meliputi
                pencitraan digital seperti X-ray dan USG yang membantu visualisasi organ internal, serta laboratorium
                lengkap untuk tes darah, urin, dan pemeriksaan mikroskopis. Teknologi ini memungkinkan kami mengidentifikasi
                masalah kesehatan secara presisi dan merencanakan perawatan yang paling efektif.
            </p>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="service-card">
            <i class="fas fa-bone service-icon"></i>
            <h4>Bedah Umum & Ortopedi</h4>
            <p>
                Tim dokter hewan bedah kami memiliki keahlian dalam berbagai prosedur bedah umum, seperti sterilisasi
                dan bedah jaringan lunak, serta bedah ortopedi yang lebih kompleks untuk cedera tulang dan sendi.
                Dengan protokol keamanan yang ketat dan pemantauan pasien yang cermat sebelum, selama, dan setelah
                operasi, kami memprioritaskan keselamatan dan pemulihan optimal hewan peliharaan Anda.
            </p>
        </div>
    </div>
    <div class="col-md-6 col-lg-4">
        <div class="service-card">
            <i class="fas fa-briefcase-medical service-icon"></i>
            <h4>Penanganan Darurat & Perawatan Intensif</h4>
            <p>
                Kami memahami bahwa keadaan darurat bisa terjadi kapan saja. Oleh karena itu, tim medis kami siaga
                untuk menangani kasus darurat dengan cepat dan efisien. Kami menyediakan perawatan intensif dan
                stabilisasi kondisi kritis, memastikan hewan peliharaan Anda mendapatkan pertolongan segera
                dan perawatan terbaik di saat-saat paling genting.
            </p>
        </div>
    </div>
</div>

@endsection