@extends('layouts.admin')

@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col s12">
        <h3 class="grey-text text-darken-3" style="font-weight: 600; margin-bottom: 5px;">Admin Dashboard</h3>
        <p class="grey-text" style="font-size: 1.1rem;">Overview of system statistics and quick actions</p>
    </div>
    
    <!-- Stats Cards Row -->
    <div class="col s12 m6 l3">
        <div class="card hoverable" style="border-radius: 15px; overflow: hidden; margin-top: 20px;">
            <div class="card-content white" style="padding: 25px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p class="grey-text" style="margin: 0; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Total Agents</p>
                        <h4 style="margin: 10px 0 0 0; font-weight: 700; color: #00695c;">{{ $agents ?? 10 }}</h4>
                    </div>
                    <div class="bg-gradient-teal circle" style="width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                        <i class="material-icons white-text" style="font-size: 28px;">people</i>
                    </div>
                </div>
            </div>
            <div class="card-action bg-gradient-teal" style="padding: 10px 25px;">
                <a href="{{ route('admin.agents.index') }}" class="white-text" style="font-size: 0.9rem; font-weight: 500;">View All <i class="material-icons tiny">arrow_forward</i></a>
            </div>
        </div>
    </div>
    
    <div class="col s12 m6 l3">
        <div class="card hoverable" style="border-radius: 15px; overflow: hidden; margin-top: 20px;">
            <div class="card-content white" style="padding: 25px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p class="grey-text" style="margin: 0; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Properties</p>
                        <h4 style="margin: 10px 0 0 0; font-weight: 700; color: #ff6f00;">{{ $properties ?? 25 }}</h4>
                    </div>
                    <div class="bg-gradient-accent circle" style="width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                        <i class="material-icons white-text" style="font-size: 28px;">home</i>
                    </div>
                </div>
            </div>
            <div class="card-action bg-gradient-accent" style="padding: 10px 25px;">
                <a href="{{ route('admin.properties.index') }}" class="white-text" style="font-size: 0.9rem; font-weight: 500;">View All <i class="material-icons tiny">arrow_forward</i></a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l3">
        <div class="card hoverable" style="border-radius: 15px; overflow: hidden; margin-top: 20px;">
            <div class="card-content white" style="padding: 25px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p class="grey-text" style="margin: 0; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Categories</p>
                        <h4 style="margin: 10px 0 0 0; font-weight: 700; color: #7b1fa2;">{{ $categories ?? 8 }}</h4>
                    </div>
                    <div class="purple darken-1 circle" style="width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                        <i class="material-icons white-text" style="font-size: 28px;">category</i>
                    </div>
                </div>
            </div>
            <div class="card-action purple darken-1" style="padding: 10px 25px;">
                <a href="{{ route('admin.categories.index') }}" class="white-text" style="font-size: 0.9rem; font-weight: 500;">Manage <i class="material-icons tiny">arrow_forward</i></a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l3">
        <div class="card hoverable" style="border-radius: 15px; overflow: hidden; margin-top: 20px;">
            <div class="card-content white" style="padding: 25px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p class="grey-text" style="margin: 0; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Blog Posts</p>
                        <h4 style="margin: 10px 0 0 0; font-weight: 700; color: #1976d2;">{{ $posts ?? 15 }}</h4>
                    </div>
                    <div class="blue darken-1 circle" style="width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                        <i class="material-icons white-text" style="font-size: 28px;">article</i>
                    </div>
                </div>
            </div>
            <div class="card-action blue darken-1" style="padding: 10px 25px;">
                <a href="{{ route('admin.posts.index') }}" class="white-text" style="font-size: 0.9rem; font-weight: 500;">View Posts <i class="material-icons tiny">arrow_forward</i></a>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="col s12" style="margin-top: 30px;">
        <h5 class="grey-text text-darken-2" style="font-weight: 600; margin-bottom: 20px;">Quick Actions</h5>
    </div>

    <div class="col s12 m6 l4">
        <div class="card hoverable" style="border-radius: 15px; padding: 30px; text-align: center;">
            <div class="accent-text" style="margin-bottom: 15px;">
                <i class="material-icons" style="font-size: 60px;">add_circle</i>
            </div>
            <h6 style="font-weight: 600; margin-bottom: 10px;">New Agent</h6>
            <p class="grey-text" style="font-size: 0.9rem; margin-bottom: 20px;">Add a new agent to the system</p>
            <a href="{{ route('admin.agents.create') }}" class="btn btn-accent waves-effect waves-light" style="border-radius: 25px;">
                <i class="material-icons left">person_add</i>Add Agent
            </a>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card hoverable" style="border-radius: 15px; padding: 30px; text-align: center;">
            <div class="purple-text text-darken-1" style="margin-bottom: 15px;">
                <i class="material-icons" style="font-size: 60px;">photo_library</i>
            </div>
            <h6 style="font-weight: 600; margin-bottom: 10px;">Manage Sliders</h6>
            <p class="grey-text" style="font-size: 0.9rem; margin-bottom: 20px;">Update homepage hero images</p>
            <a href="{{ route('admin.sliders.index') }}" class="btn purple darken-1 waves-effect waves-light" style="border-radius: 25px;">
                <i class="material-icons left">image</i>View Sliders
            </a>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card hoverable" style="border-radius: 15px; padding: 30px; text-align: center;">
            <div class="blue-text text-darken-1" style="margin-bottom: 15px;">
                <i class="material-icons" style="font-size: 60px;">create</i>
            </div>
            <h6 style="font-weight: 600; margin-bottom: 10px;">New Blog Post</h6>
            <p class="grey-text" style="font-size: 0.9rem; margin-bottom: 20px;">Create a new article or news</p>
            <a href="{{ route('admin.posts.create') }}" class="btn blue darken-1 waves-effect waves-light" style="border-radius: 25px;">
                <i class="material-icons left">edit</i>Create Post
            </a>
        </div>
    </div>
</div>
    <!-- Analytics Chart -->
    <div class="col s12" style="margin-top: 30px;">
        <div class="card" style="border-radius: 15px; padding: 20px;">
            <div class="card-content">
                <span class="card-title grey-text text-darken-4" style="font-weight: 600;">Property Analytics</span>
                <p class="grey-text">New Properties Added Over Time</p>
                <div style="position: relative; height: 350px; width: 100%; margin-top: 20px;">
                    <canvas id="propertiesChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('propertiesChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'New Properties',
                    data: {!! json_encode($monthCounts) !!},
                    backgroundColor: 'rgba(57, 73, 171, 0.2)',
                    borderColor: '#3949ab',
                    borderWidth: 2,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#3949ab',
                    pointRadius: 4,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e0e0e0'
                        },
                        ticks: {
                            stepSize: 1
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
