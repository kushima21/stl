<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="icon" type="image/png" href="{{ asset('system-image/ckcm.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
    <!-- Left content goes here -->
    <div class="left-container" id="leftContainer">
        <div class="left-header">
            <img src="{{ asset('system-image/ckcm.png') }}" alt="Logo" style="width: 40px; height: 40px;">
            <h2>Lotto ni Choy</h2>
            <span>V2.1o1.I0t</span>
        </div>
        <div class="link-container">
            <div class="link-profile" id="profileToggle">
                <img src="{{ asset('system-image/   user.png') }}" alt="Profile" style="width: 35px; height: 35px; border-radius: 50%; margin: 10px;">
                <div class="profile-info">
                    <span>Choy</span>
                    <p>Administrator</p>
                </div>
            </div>
            <div class="profile-settings" id="profileSettings" style="display: none;"></div>
            <div class="home-container"><span>Dashboard Overview</span></div>
            <div class="manage-container">
                <span>Manage</span>
                <nav class="manage-links">
                    <div class="link"><a href="">Admin Dashboard</a></div>
                    <div class="link"><a href="">Generate Results</a></div>
                    <div class="link">
                        <a href="{{ url('/registrations') }}">Registrations</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>

    <!-- Right content goes here -->
    <div class="right-container" id="rightContainer">
        <div class="right-header">
            <i class="fa fa-bars" id="menuToggle"></i>
            <i class="fa fa-bell"></i>
        </div>
    </div>
</div>

   <style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body, html {
        width: 100%;
        height: 100vh;
        font-family: 'Roboto Flex', sans-serif;
    }

    .container {
        width: 100%;
        height: 100vh;
        background-color: var(--ckcm-color1);
        display: flex;
        flex-direction: row;
    }

    /*left container */

    .left-container {
    width: 20%;
    height: 100%;
    box-shadow: 0px 0px 0px 1px black;
    background-color: #fff;
    display: flex;
    flex-direction: column; /* so header + link-container stack vertically */
}

    .left-header {
        width: 100%;
        height: 60px;
        box-shadow: 0px 0px 0px 1px black;
        display: flex;
        align-items: center;
    }
    .left-header img {
        margin-left: 10px;
    }
     .left-header h2 {
        margin-left: 10px;
        font-size: 20px;
        color: #333; /* optional */
     }

      .left-header span {
        margin-left: auto; /* This pushes the version number to the right */
        margin-right: 15px; /* Add some space from the right edge */
        font-size: 13px;
        color: #666; /* optional */
      }

       
    .link-container {
        width: 100%;
        flex: 1; /* takes remaining vertical space */
        overflow-y: auto;
    }

    .link-profile {
        margin-top: 10px;
        margin-left: 5px;
        width: 95%;
        height: 45px;
        display: flex;
        align-items: center;
        cursor: pointer;
        border-radius: 14px; 
    }

    .profile-info span {
        margin-left: 5px;
        font-size: 14px;
        font-weight: bold;
        color: #333; /* optional */
    }
     .profile-info p {
        margin-left: 5px;
        font-size: 14px;
        color: #666; /* optional */
     }

       .link-profile:hover {
        background: gray;
       }

        .profile-settings {
        width: 19%;
        height: 150px;
        box-shadow: 0px 0px 0px 1px black;
        margin-left: 5px;
        margin-top: 5px;
        position: fixed;
        border-radius: 12px;
        background-color: white;
        z-index: 1000;
    }
    .home-container {
        width: 95%;
        height: 30px;
        box-shadow: 0px 0px 0px 1px black;
        margin-top: 10px;
        margin-left: 5px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        padding-left: 10px;
    }

    .home-container span {
        font-size: 14px;
    }

    .manage-container {
        width: 100%;
        min-height: 70%;
        margin-top: 5px;
        overflow-y: scroll;
        padding-left: 5px;
        padding-top: 5px;
        margin-top: 5px;
    }
    .manage-container span {
        font-size: 14px;
    }

    .manage-links {
        width: 100%;
        height: 100%;
        margin-top: 5px;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .link {
        width: 98%;
        height: 35px;
        box-shadow: 0px 0px 0px 1px black;
        display: flex;
        align-items: center;
        border-radius: 5px;
        padding-left: 5px;
    }
     .link a {
        text-decoration: none;
        font-size: 14px;
     }
      .link:hover {
        background: rgb(199, 201, 206);
        color: white;
      }


    /*right container */

    .right-container {
    width: 80%;
    height: 100%;
    background-color: #f0f0f0; /* optional */
    }
    .right-container.expanded {
    width: 100% !important;
}

    .right-header {
        width: 100%;
        height: 35px;
        box-shadow: 0px 0px 0px 1px black;
        display: flex;
        align-items: center;
        justify-content: space-between; /* This spaces the icons apart */
        padding: 0 10px; /* Add padding so icons don't stick to edges */
    }

    .right-header i {
        font-size: 20px;
        color: #333; /* optional */
    }

    .content-container {
        width: 100%;
        height: auto;
        display: flex;
        justify-content: space-between;
        margin-top: 5px;
        padding: 5px 20px;
    }

      .content-container h2 {
        font-size: 21px;
        font-weight: 500;
      }

      .addBtn button{
        width: 150px;
        height: 38px;
        border-radius: 12px;
        border: none;
        color: black;
        font-size: 12px;
        background: linear-gradient(rgb(153, 3, 3), rgb(112, 2, 2));
        color: white;
    }

      .addBtn button:hover {
        background: linear-gradient(rgb(153, 3, 3), rgb(112, 2, 2));
        cursor: pointer;
        color: white;
        font-size: 12px;
      }

    .registration-container {
    width: 600px;
    height: max-content;
    box-shadow: 0px 0px 0px 1px black;
    position: fixed;
    top: 50%;
    left: 60%;
    transform: translate(-50%, -50%);
    background-color: white;
    z-index: 999;
    border-radius: 10px;
    padding: 10px; /* Optional spacing */
    box-sizing: border-box;
    display: none;
}
.registration-header {
    width: 98%;
    height: 50px;
    position: fixed;
}
.registration-header h2 {
  display: flex;
    justify-content: center;
    font-weight: 500;
    font-size: 20px;
}


.registration-form {
    margin-top: 20px;
    display: flex;
    justify-content: center;
    align-items: start;
    height: 100%;
    padding: 10px 0;
    overflow-y: auto; /* Just in case content goes beyond 450px */
}

.registration-form form {
    display: flex;
    flex-direction: column;
    width: 100%;
    padding: 0 20px;
    gap: 8px;
}

.registration-form form input,
.registration-form form select {
    padding: 6px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.registrationBTn {
    width: 100%;
    height: auto;
    justify-content: space-between;
    align-content: center;
    display: flex;
    margin-top: 5px;
}
.registrationBTn button {
    width: 85px;
    height: 32px;
    margin-left: 20px;
    margin-right: 20px;
    border-radius: 8px;
}



    /* ✅ Responsive adjustment for tablets */
    @media (max-width: 768px) {
        .left-container {
            width: 50%;
        }   
    }

    /* ✅ Responsive adjustment for mobile phones */
    @media (max-width: 480px) {
        .container {
            flex-direction: column;
        }

        .left-container {
            width: 100%;
            height: auto;
            box-shadow: none;
        }

        .right-container {
            width: 100%;
            height: auto;
        }
    }
</style>
<script>
// Full list of provinces (81 total) and some sample municipalities
const phData = {
    "Ilocos Norte": ["Laoag", "Batac", "Paoay", "Burgos"],
    "Ilocos Sur": ["Vigan", "Candon", "Santa", "Narvacan"],
    "La Union": ["San Fernando", "Bauang", "Agoo", "Naguilian"],
    "Pangasinan": ["Dagupan", "Urdaneta", "Alaminos", "San Carlos"],
    "Batanes": ["Basco", "Mahatao", "Ivana", "Itbayat"],
    "Cagayan": ["Tuguegarao", "Aparri", "Penablanca", "Gattaran"],
    "Isabela": ["Ilagan", "Cauayan", "Santiago", "Roxas"],
    "Nueva Vizcaya": ["Bayombong", "Solano", "Bambang"],
    "Quirino": ["Cabarroguis", "Diffun", "Saguday"],
    "Aurora": ["Baler", "Maria Aurora", "Dipaculao"],
    "Bataan": ["Balanga", "Orani", "Abucay"],
    "Bulacan": ["Malolos", "Meycauayan", "San Jose del Monte"],
    "Nueva Ecija": ["Cabanatuan", "San Jose City", "Gapan"],
    "Pampanga": ["San Fernando", "Angeles", "Mabalacat"],
    "Tarlac": ["Tarlac City", "Capas", "Concepcion"],
    "Zambales": ["Olongapo", "Iba", "Subic"],
    "Batangas": ["Batangas City", "Lipa", "Tanauan"],
    "Cavite": ["Dasmariñas", "Imus", "Tagaytay"],
    "Laguna": ["Calamba", "Santa Rosa", "San Pablo"],
    "Quezon": ["Lucena", "Tayabas", "Candelaria"],
    "Rizal": ["Antipolo", "Binangonan", "Taytay"],
    "Albay": ["Legazpi", "Tabaco", "Ligao"],
    "Camarines Norte": ["Daet", "Mercedes", "Labo"],
    "Camarines Sur": ["Naga", "Iriga", "Pili"],
    "Catanduanes": ["Virac", "San Andres"],
    "Masbate": ["Masbate City", "Aroroy"],
    "Sorsogon": ["Sorsogon City", "Gubat"],
    "Aklan": ["Kalibo", "Malay", "Numancia"],
    "Antique": ["San Jose", "Sibalom", "Hamtic"],
    "Capiz": ["Roxas City", "Panay"],
    "Guimaras": ["Jordan", "Buenavista"],
    "Iloilo": ["Iloilo City", "Passi", "Pototan"],
    "Negros Occidental": ["Bacolod", "Talisay", "Kabankalan"],
    "Bohol": ["Tagbilaran", "Panglao", "Ubay"],
    "Cebu": ["Cebu City", "Mandaue", "Lapu-Lapu", "Talisay"],
    "Negros Oriental": ["Dumaguete", "Bayawan", "Bais"],
    "Eastern Samar": ["Borongan", "Guiuan"],
    "Leyte": ["Tacloban", "Ormoc", "Palo"],
    "Northern Samar": ["Catarman", "Allen"],
    "Samar": ["Calbayog", "Catbalogan"],
    "Southern Leyte": ["Maasin", "Sogod"],
    "Zamboanga del Norte": ["Dipolog", "Dapitan"],
    "Zamboanga del Sur": ["Pagadian", "Zamboanga City"],
    "Zamboanga Sibugay": ["Ipil", "Kabasalan"],
    "Bukidnon": ["Malaybalay", "Valencia"],
    "Camiguin": ["Mambajao", "Catarman"],
    "Lanao del Norte": ["Iligan", "Tubod"],
    "Misamis Occidental": ["Oroquieta", "Ozamis"],
    "Misamis Oriental": ["Cagayan de Oro", "Gingoog"],
    "Compostela Valley": ["Nabunturan", "Monkayo"],
    "Davao del Norte": ["Tagum", "Panabo"],
    "Davao del Sur": ["Davao City", "Digos"],
    "Davao Oriental": ["Mati", "Baganga"],
    "Cotabato": ["Kidapawan", "M'lang"],
    "South Cotabato": ["Koronadal", "General Santos"],
    "Sultan Kudarat": ["Isulan", "Tacurong"],
    "Sarangani": ["Alabel", "Glan"],
    "Agusan del Norte": ["Butuan", "Cabadbaran"],
    "Agusan del Sur": ["Bayugan", "San Francisco"],
    "Dinagat Islands": ["San Jose", "Loreto"],
    "Surigao del Norte": ["Surigao City", "Dapa"],
    "Surigao del Sur": ["Tandag", "Bislig"],
    "Basilan": ["Isabela City", "Lamitan"],
    "Lanao del Sur": ["Marawi", "Balindong"],
    "Maguindanao": ["Buluan", "Cotabato City"],
    "Sulu": ["Jolo", "Patikul"],
    "Tawi-Tawi": ["Bongao", "Panglima Sugala"]
};

// Load all provinces into dropdown
const provinceDropdown = document.getElementById("location");
Object.keys(phData).forEach(province => {
    const option = document.createElement("option");
    option.value = province;
    option.textContent = province;
    provinceDropdown.appendChild(option);
});

// Update municipalities when province changes
provinceDropdown.addEventListener("change", function() {
    const selectedProvince = this.value;
    const municipalityDropdown = document.getElementById("areaLocation");
    municipalityDropdown.innerHTML = '<option value="">-- Select Municipality --</option>';

    if (phData[selectedProvince]) {
        phData[selectedProvince].forEach(muni => {
            const option = document.createElement("option");
            option.value = muni;
            option.textContent = muni;
            municipalityDropdown.appendChild(option);
        });
    }
});
</script>

<script>
    document.getElementById('menuToggle').addEventListener('click', function () {
        const left = document.getElementById('leftContainer');
        const right = document.getElementById('rightContainer');

        if (left.style.display !== 'none') {
            left.style.display = 'none';
            right.classList.add('expanded');
        } else {
            left.style.display = 'block';
            right.classList.remove('expanded');
        }
    });
</script>
<script>
    const profileToggle = document.getElementById('profileToggle');
    const profileSettings = document.getElementById('profileSettings');

    profileToggle.addEventListener('click', () => {
        if (profileSettings.style.display === 'none' || profileSettings.style.display === '') {
            profileSettings.style.display = 'block';
        } else {
            profileSettings.style.display = 'none';
        }
    });

    // Optional: Close it if clicked outside
    document.addEventListener('click', (e) => {
        if (!profileToggle.contains(e.target) && !profileSettings.contains(e.target)) {
            profileSettings.style.display = 'none';
        }
    });
</script>
<script>
    const modal = document.querySelector('.registration-container');
    const openBtn = document.getElementById('openModalBtn');
    const closeBtn = document.getElementById('closeModalBtn');

    openBtn.addEventListener('click', () => {
        modal.style.display = 'block';
    });

    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });
</script>
</body>
</html>