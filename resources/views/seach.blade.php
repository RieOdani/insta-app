@extends('layouts.app')

@section('title', 'Admin:Users')

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-success text-secondary">
            <th></th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>CREATED AT</th>
            <th>STATUS</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($all_users as $user)
                <tr>
                    <td>
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle d-block mx-auto avatar-md">
                        @else
                            <i class="fa-solid fa-user-circle d-block text-center icon-md"></i>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        @if ($user->trashed())
                            <i class="fa-solid fa-circle text-secondary"></i>&nbsp; Inactive
                        @else
                            <i class="fa-solid fa-circle text-success"></i>&nbsp; Active
                        @endif

                    </td>
                    <td>
                        @if (Auth::user()->id !== $user->id)
                            <div class="dropdown">
                                <button class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>

                                @if ($user->trashed())
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-success" data-bs-toggle="modal" data-bs-target="#activate-user-{{ $user->id }}">
                                            <i class="fa-solid fa-user-check"></i> Activate {{ $user->name }}
                                        </button>
                                    </div>
                                @else
                                    <div class="dropdown-menu">
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deactivate-user-{{ $user->id }}">
                                            <i class="fa-solid fa-user-slash"></i> Deactivate {{ $user->name }}
                                        </button>
                                    </div>
                                @endif


                            </div>
                            @include('admin.users.modal.status')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $all_users->links() }}
    </div>

@endsection


Garry Rodriguez
  20:00
public function search(Request $request)
    {
        $users = $this->user->where('name', 'like', '%' .$request->search. '%')->get();
        return view('users.search')->with('users', $users)->with('search', $request->search);
    }


Garry Rodriguez
  20:13
@extends('layouts.app')

@section('title', 'Explore People')

@section('content')
    <div class="row justify-content-center">
        <div class="col-5">
            <p class="h5 text-muted mb-4">Search results for <span class="fw-bold">{{ $search }}</span></p>
        </div>

        @forelse ($users as $user)
            <div class="row align-items-center mb-3">
                <div class="col-auto">
                    @if ($user->avatar)
                        <a href="{{ route('profile.show', $user->id) }}">
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle avatar-md">
                        </a>
                    @else
                        <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                    @endif

                </div>
                <div class="col ps-0 text-truncate">
                    <a href="{{ route('profile.show', $user->id) }}" class="text-decoration-none text0dark fw-bold">{{ $user->name }}</a>
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
                <div class="col-auto">
                    @if ($user->id !== Auth::user()->id)
                        @if ($user->isFollowed())
                            <form action="{{ route('follow.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-secondary fw-bold btn-sm">Following</button>
                            </form>
                        @else
                        <form action="{{ route('follow.store', $user->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary fw-bold btn-sm">Follow</button>
                        </form>
                        @endif
                    @endif
                </div>
            </div>
        @empty
            <p class="lead text-muted text-center">No users found</p>
        @endforelse
    </div>
@endsection









