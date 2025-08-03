@extends('layout.default')
@section('content')
@vite(['resources/css/registration.css', 'resources/js/app.js'])
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
                        <form method="POST" action="{{ route('register.store') }}">
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

                <div class="registration-table-container">
                <h2 class="registration-table-header">Registered Accounts</h2>
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
                    <td>
                        <div class="status-toggle-container">
                            <label class="toggle-switch">
                                <input type="checkbox" class="animatedSwitch"
                                    data-id="{{ $registration->id }}"
                                    {{ $registration->status === 'active' ? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                            <span class="status-label" id="statusText-{{ $registration->id }}"
                                style="color: {{ $registration->status === 'active' ? '#4CAF50' : '#333' }}">
                                {{ strtoupper($registration->status === 'active' ? 'ON' : 'OFF') }}
                            </span>
                        </div>
                    </td>
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
           <script>
    document.querySelectorAll('.animatedSwitch').forEach(function (toggle) {
        toggle.addEventListener('change', function () {
            const userId = this.dataset.id;
            const status = this.checked ? 'active' : 'deactive';

            fetch(`/registration/update-status/${userId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                const statusLabel = document.getElementById(`statusText-${userId}`);
                statusLabel.textContent = status.toUpperCase();
                statusLabel.style.color = status === 'active' ? '#4CAF50' : '#333';
            })
            .catch(error => {
                console.error('Error updating status:', error);
            });
        });
    });
</script>


@endsection
