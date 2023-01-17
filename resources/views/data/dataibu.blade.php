@extends('layouts.master')
@section('title', 'Data Ibu')
@section('content')
  <!--begin::Card body-->
  <div class="card-body pb-0">
    <div class="d-flex flex-wrap flex-stack mb-6">
      <div class="d-flex flex-row">
        <div class="d-flex my-2">
          <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
            Tambah Data Ibu
          </button>
        </div>
        <div class="d-flex my-2 ms-2">
          <form action="#" method="get">
            <input name="export" type="hidden" value="1">
            <input name="tahun" type="hidden" value="{{ $tahun ?? null }}">
            <input name="cari" type="hidden" value="{{ $cari ?? null }}">
            <button class="btn btn-sm btn-success">Export</button>
          </form>
        </div>
      </div>
      <form action="#" method="get">
        <div class="d-flex my-2">
          <select name="tahun" class="form-select form-select-sm text-black" data-placeholder="Pilih Tahun">
            <option disabled selected>Pilih Tahun</option>
            @for ($i = 2021; $i <= Carbon\Carbon::now()->format('Y'); $i++)
              <option {{ ($tahun ?? Carbon\Carbon::now()->format('Y')) == $i ? 'selected' : '' }}
                value="{{ $i }}">{{ $i }}
              </option>
            @endfor
          </select>
          <!--begin::Search-->
          <div class="d-flex align-items-center position-relative ms-2">
            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
            <span class="svg-icon svg-icon-3 position-absolute ms-3">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                  transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                <path
                  d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                  fill="currentColor"></path>
              </svg>
            </span>
            <!--end::Svg Icon-->
            <input name="cari" value="{{ $cari ?? null }}" type="text"
              class="form-control form-control-sm border-body bg-body w-200px ps-10" placeholder="Cari...">
          </div>
          <!--end::Search-->
          <button type="submit" class="btn btn-sm btn-info">Cari</button>
        </div>
      </form>
    </div>
    <div class="row table-responsive">
      <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
        <!--begin::Table head-->
        <thead>
          <!--begin::Table row-->
          <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
            <th class="w-10px pe-2">
              <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                <input class="form-check-input" type="checkbox" data-kt-check="true"
                  data-kt-check-target="#kt_table_users .form-check-input" value="1" />
              </div>
            </th>
            <th class="min-w-20px">No</th>
            <th class="min-w-125px">User</th>
            <th class="min-w-125px">Hp</th>
            <th class="min-w-125px">Alamat</th>
            <th class="min-w-125px">Hak Akses & Status</th>
            <th class="min-w-125px">Tanggal Bergabung</th>
            <th class="text-end min-w-100px">Actions</th>
          </tr>
          <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
          @forelse ($users as $key => $value)
            <!--begin::Table row-->
            <tr>
              <!--begin::Checkbox-->
              <td>
                <div class="form-check form-check-sm form-check-custom form-check-solid">
                  <input class="form-check-input" type="checkbox" value="1" />
                </div>
              </td>
              <!--end::Checkbox-->
              <!--begin::Number=-->
              <td>
                <div class="badge badge-light fw-bold">{{ $users->firstItem() + $key }}</div>
              </td>
              <!--end::Number=-->
              <!--begin::User=-->
              <td class="d-flex align-items-center">
                <!--begin:: Avatar -->
                <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                  @if ($value->profile_photo_path)
                    <img src="{{ asset('avatar/' . $value->profile_photo_path) }}" alt="">
                  @else
                    <div class="symbol-label fs-3 bg-light-danger text-danger">✔️</div>
                  @endif
                </div>
                <!--end::Avatar-->
                <!--begin::User details-->
                <div class="d-flex flex-column">
                  <a href="{{ route('show.user', $value->id) }}"
                    class="text-gray-800 text-hover-primary mb-1">{{ $value->name }}</a>
                  <span>{{ $value->email }}</span>
                </div>
                <!--begin::User details-->
              </td>
              <!--end::User=-->
              <!--begin::Role=-->
              <td>{{ $value->no_hp ?? '-' }}</td>
              <!--end::Role=-->
              <!--begin::Last login=-->
              <td>
                <div class="badge badge-light fw-bold">{{ $value->alamat ?? '-' }}</div>
              </td>
              <!--end::Last login=-->
              <!--begin::Two step=-->
              <td class="text-center">
                <span class="badge badge-light-success fw-bold mb-1">
                  @foreach (config('matt.role') as $key => $item)
                    {{ $key == $value->role ? $item : '' }}
                  @endforeach
                </span><br>
                <span class="badge badge-light-info fw-bold">
                  @foreach (config('matt.status') as $key => $item)
                    {{ $key == $value->status ? $item : '' }}
                  @endforeach
                </span>
              </td>
              <!--end::Two step=-->
              <!--begin::Joined-->
              <td class="text-center">{{ \Carbon\Carbon::parse($value->created_at)->format('d F Y') }}</td>
              <!--begin::Joined-->
              <!--begin::Action=-->
              <td class="text-end">
                <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click"
                  data-kt-menu-placement="bottom-end">Actions
                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                  <span class="svg-icon svg-icon-5 m-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path
                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                        fill="currentColor" />
                    </svg>
                  </span>
                  <!--end::Svg Icon-->
                </a>
                <!--begin::Menu-->
                <div
                  class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                  data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="{{ route('lihatanak', $value->id) }}" class="menu-link px-3">Data Anak</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="{{ route('edit.client', $value->id) }}" class="menu-link px-3">Edit</a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <a href="#" class="menu-link px-3" data-kt-users-table-filter="delete_row">Delete</a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </td>
              <!--end::Action=-->
            </tr>
            <!--end::Table row-->
          @empty
            <tr>
              <td colspan="7">Data Tidak Di temukan</td>
            </tr>
          @endforelse
        </tbody>
        <!--end::Table body-->
      </table>
    </div>
  </div>
  <!--end::Card body-->
@endsection
