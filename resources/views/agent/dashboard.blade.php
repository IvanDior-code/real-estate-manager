@extends('layouts.agent')

@section('content')
<div class="row" style="margin-top: 20px;">
    <div class="col s12">
        <h3 class="grey-text text-darken-3" style="font-weight: 600; margin-bottom: 5px;">Agent Dashboard</h3>
        <p class="grey-text" style="font-size: 1.1rem;">Welcome back, <span class="accent-text" style="font-weight: 600;">{{ Auth::user()->name }}</span></p>
    </div>

    <!-- Stats Row -->
    <div class="col s12 m6 l4">
        <div class="card hoverable" style="border-radius: 15px; overflow: hidden; margin-top: 20px;">
            <div class="card-content white" style="padding: 25px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p class="grey-text" style="margin: 0; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">My Properties</p>
                        <h4 style="margin: 10px 0 0 0; font-weight: 700; color: #3949ab;">{{ Auth::user()->properties->count() ?? 0 }}</h4>
                        <p class="grey-text" style="font-size: 0.85rem; margin-top: 5px;">
                            <span class="green-text">{{ Auth::user()->properties->where('is_approved', true)->count() ?? 0 }} Active</span>
                        </p>
                    </div>
                    <div class="bg-gradient-indigo circle" style="width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                        <i class="material-icons white-text" style="font-size: 28px;">home</i>
                    </div>
                </div>
            </div>
            <div class="card-action bg-gradient-indigo" style="padding: 10px 25px;">
                <a href="{{ route('agent.properties.index') }}" class="white-text" style="font-size: 0.9rem; font-weight: 500;">View All <i class="material-icons tiny">arrow_forward</i></a>
            </div>
        </div>
    </div>
    
    <div class="col s12 m6 l4">
        <div class="card hoverable" style="border-radius: 15px; overflow: hidden; margin-top: 20px;">
            <div class="card-content white" style="padding: 25px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p class="grey-text" style="margin: 0; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Messages</p>
                        <h4 style="margin: 10px 0 0 0; font-weight: 700; color: #c2185b;">{{ Auth::user()->receivedMessages->count() ?? 0 }}</h4>
                        <p class="grey-text" style="font-size: 0.85rem; margin-top: 5px;">Inquiries from clients</p>
                    </div>
                    <div class="pink darken-1 circle" style="width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                        <i class="material-icons white-text" style="font-size: 28px;">message</i>
                    </div>
                </div>
            </div>
            <div class="card-action pink darken-1" style="padding: 10px 25px;">
                <a href="{{ route('agent.messages.index') }}" class="white-text" style="font-size: 0.9rem; font-weight: 500;">View Messages <i class="material-icons tiny">arrow_forward</i></a>
            </div>
        </div>
    </div>

    <div class="col s12 m6 l4">
        <div class="card hoverable" style="border-radius: 15px; overflow: hidden; margin-top: 20px;">
            <div class="card-content white" style="padding: 25px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <p class="grey-text" style="margin: 0; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 0.5px;">Profile</p>
                        <h4 style="margin: 10px 0 0 0; font-weight: 700; color: #00695c;">{{ Auth::user()->properties->where('is_approved', true)->count() > 0 ? 'Active' : 'Setup' }}</h4>
                        <p class="grey-text" style="font-size: 0.85rem; margin-top: 5px;">Manage your info</p>
                    </div>
                    <div class="teal darken-2 circle" style="width: 55px; height: 55px; display: flex; align-items: center; justify-content: center;">
                        <i class="material-icons white-text" style="font-size: 28px;">person</i>
                    </div>
                </div>
            </div>
            <div class="card-action teal darken-2" style="padding: 10px 25px;">
                <a href="{{ route('agent.profile.edit') }}" class="white-text" style="font-size: 0.9rem; font-weight: 500;">Edit Profile <i class="material-icons tiny">arrow_forward</i></a>
            </div>
        </div>
    </div>

    <!-- Quick Actions Section -->
    <div class="col s12" style="margin-top: 30px;">
        <h5 class="grey-text text-darken-2" style="font-weight: 600; margin-bottom: 20px;">Quick Actions</h5>
    </div>

    <div class="col s12 m6">
        <div class="card hoverable" style="border-radius: 15px; padding: 35px; text-align: center; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
            <div class="white-text" style="margin-bottom: 15px;">
                <i class="material-icons" style="font-size: 70px;">add_home</i>
            </div>
            <h5 class="white-text" style="font-weight: 600; margin-bottom: 10px;">List a Property</h5>
            <p class="white-text" style="opacity: 0.9; font-size: 0.95rem; margin-bottom: 25px;">Add a new property listing to showcase to potential buyers</p>
            <a href="{{ route('agent.properties.create') }}" class="btn btn-large white accent-text waves-effect" style="border-radius: 30px; font-weight: 600;">
                <i class="material-icons left">add_circle</i>Add Property
            </a>
        </div>
    </div>

    <div class="col s12 m6">
        <div class="card hoverable" style="border-radius: 15px; padding: 35px; text-align: center; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
            <div class="white-text" style="margin-bottom: 15px;">
                <i class="material-icons" style="font-size: 70px;">insights</i>
            </div>
            <h5 class="white-text" style="font-weight: 600; margin-bottom: 10px;">Performance</h5>
            <p class="white-text" style="opacity: 0.9; font-size: 0.95rem; margin-bottom: 25px;">View your listing performance and client engagement metrics</p>
            <a href="{{ route('agent.properties.index') }}" class="btn btn-large white pink-text waves-effect" style="border-radius: 30px; font-weight: 600;">
                <i class="material-icons left">bar_chart</i>View Stats
            </a>
        </div>
    </div>
</div>
    <!-- Analytics Chart -->
    <div class="col s12" style="margin-top: 30px;">
        <div class="card" style="border-radius: 15px; padding: 20px;">
            <div class="card-content">
                <span class="card-title grey-text text-darken-4" style="font-weight: 600;">My Performance</span>
                <p class="grey-text">Properties Listed Over Time</p>
                <div style="position: relative; height: 350px; width: 100%; margin-top: 20px;">
                    <canvas id="agentChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('agentChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: 'Properties Listed',
                    data: {!! json_encode($monthCounts) !!},
                    backgroundColor: 'rgba(255, 64, 129, 0.6)',
                    borderColor: '#ff4081',
                    borderWidth: 1,
                    borderRadius: 5,
                    barPercentage: 0.6,
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
