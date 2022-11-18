<div class="card shadow">
    <div class="card-body row">
            <div class="col-md-3 dropdown my-auto">
                <button class="btn btn-sm btn-secondary dropdown-toggle ms-5" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Stations
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    @foreach($stations as $station)
                        <li class="m-2"><input wire:model="station.{{ $station->id }}" class="form-check-input mx-2" type="checkbox" value="{{ $station->id }}" >{{ $station->nomeEstacao }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 mb-3">
                <label for="">From:</label>
                <input wire:model="from" type="date" class="form-control" id="start_date" placeholder="From" />
            </div>
            <div class="col-md-3 mb-3">
                <label for="">To:</label>
                <input wire:model="to" type="date" class="form-control" id="end_date" placeholder="To" />
            </div>
        <table class="table mb-4">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"><i class="fas fa-home"></i> Station</th>
                <th class="d-none d-md-table-cell" scope="col"><i class="fas fa-directions"></i> Direction</th>
                <th class="d-none d-lg-table-cell" scope="col"><i class="fas fa-calendar-alt"></i> Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($winddirections as $key => $direction)
                <tr>
                    <th class="align-middle" scope="row">{{ $key +1 }}</th>
                    <td class="align-middle">{{ $direction->idEstacao }}</td>
                    <td class="align-middle d-none d-md-table-cell">{{ $direction->valor }}</td>
                    <td class="align-middle d-none d-lg-table-cell">{{ $direction->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $winddirections-> links() !!}
    </div>
</div>

