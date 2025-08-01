
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>STL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="/your-path-to-uicons/css/uicons-[your-style].css" rel="stylesheet"> <!--load all styles -->
    @vite(['resources/css/default.css', 'resources/js/app.js'])
    @vite(['resources/css/registration.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('system-image/ckcm.png') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="default-main-container">
        <div class="left-default-box">
            <div class="left-header">
                <img src="{{ asset('image/ckcm.png') }}">
                <h2>Lotto ni Choy <span>v1.03.20.2025</span></h2>
            </div>
            <div class="left-dashboard-link">
                <div class="user-box-container">
                    <img src="{{ asset('image/user.png') }}">
                    <div class="user-info">
                        <h4>Hondrada John Mark</h4>
                        <span>ID#: 20003</span>
                    </div>
                </div>
            </div>
            <div class="user-box"></div>
            <a href="#">
                <div class="dashboard-link-container">
                    <i class="fa fa-home"></i>
                    <h2>Dashboard Overviews</h2>
                </div>
            </a>
            <h2 class="header-manage">Manage</h2>
            <div class="manage-container-box">
                <a href="#">
                    <div class="manage-links">
                        <i class="fa fa-clock"></i>
                        <h2>Admin Dashboard</h2>
                    </div>
                </a>
                <a href="#">
                    <div class="manage-links">
                        <i class="fa fa-book"></i>
                        <h2>Generate Results</h2>
                    </div>
                </a>
                <a href="{{ url('/registrations') }}">
                    <div class="manage-links">
                         <i class="fa fa-user"></i>
                         <h2>Registrations</h2>
                    </div>
                </a>
            </div>
        </div>
        <div class="right-default-box">

            <div class="right-header">
                <i class="fa fa-bars" id="menuToggle"></i>
                <i class="fa fa-bell"></i>
            </div>

            <div class="registration-content-container">
                <div class="registration-header">
                    <h2>Registrations</h2>
                    <button type="button" id="openModalBtn">Create New One</button>
                </div>
                <div class="searchBar" id="">
                    <form method="GET" action="">
                        <i class="fas fa-search"></i>
                        <input type="text" name="" placeholder="Quick Search" id="tableSearchInput">
                    </form>
                </div>

                <div class="registration-container">
                    <h2 class="create-header">Register New Account</h2>

                    <div class="registration-form">
                        <form method="POST" action="">
                            @csrf
                            <label for="completeName">Complete Name</label>
                            <br>
                            <input type="text" name="completeName" id="completeName" placeholder="Complete Name" required>
                            <br>
                            <label for="username">Username</label>
                            <br>
                            <input type="text" name="username" id="username" placeholder="Username" required>
                            <br>
                            <label for="phoneNumber">Phone Number:</label>
                            <br>
                            <input type="number" name="phoneNumber" id="phoneNumber" placeholder="Phone Number" value=""
                            required maxlength="11" oninput="this.value = this.value.slice(0, 11);">
                            <br>
                            <label for="password">Password:</label>
                            <br>
                            <input type="password" name="password" id="password" placeholder="Password" value="" required>
                            <br>
                            <label for="location">Location (Per Province):</label>
                            <br>
                            <select name="location" id="location" required>
                            <option value="">-- Select Province --</option>
                            </select>
                            <br>
                            <label for="areaLocation">Area Location (Per Municipality)</label>
                            <br>
                             <select name="areaLocation" id="areaLocation" required>
                            <option value="">-- Select Municipality --</option>
                            </select>
                            <br>
                            <label for="areaName">Area Name:</label>
                            <br>
                            <input type="text" name="areaName" id="areaName" placeholder="Area Name" value="" required>
                            <br>
                            <label for="position">Position:</label>
                            <br>
                            <select name="position">
                            <option value="">--Select Position--</option>
                            <option value="superAdmin">Super Admin</option>
                            <option value="admin">Admin</option>
                            </select>
                            <div class="registrationBTn">
                                <button type="submit">Submit</button>
                                <button type="button" id="closeModalBtn">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="registration-table">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Username</th>
                        <th>Phone Number</th>
                        <th>Location</th>
                        <th>Area Location</th>
                        <th>Area Name</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $registration)
                        <tr>
                            <td>{{ $registration->complete_name }}</td>
                            <td>{{ $registration->username }}</td>
                            <td>{{ $registration->phone_number }}</td>
                            <td>{{ $registration->location }}</td>
                            <td>{{ $registration->area_location }}</td>
                            <td>{{ $registration->area_name }}</td>
                            <td>{{ $registration->position }}</td>
                            <td>{{ ucfirst($registration->status) }}</td>
                            <td>
                                <button>Edit</button>
                                <button>Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
            </div>
        </div>
    </div>

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
<script>
    const menuToggle = document.getElementById('menuToggle');
    const sidebar = document.querySelector('.left-default-box');
    const rightBox = document.querySelector('.right-default-box');

    // Toggle sidebar
    menuToggle.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevent bubbling to document
        sidebar.classList.toggle('active');
    });

    // Close sidebar when clicking outside (right side)
    document.addEventListener('click', (e) => {
        if (sidebar.classList.contains('active') && !sidebar.contains(e.target) && !menuToggle.contains(e.target)) {
            sidebar.classList.remove('active');
        }
    });
</script>
<script>
document.getElementById('tableSearchInput').addEventListener('input', function () {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('.registration-table tbody tr');

    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});
</script>

</body>
</html>