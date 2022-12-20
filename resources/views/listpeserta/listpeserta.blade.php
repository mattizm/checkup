@extends('layouts.master')
@section('title', 'List Peserta')
@section('content')
  <!--begin::Card body-->
  <div class="card-body pb-0">
    <div class="d-flex flex-wrap flex-stack mb-6">
      <div class="d-flex flex-row">
        <div class="d-flex my-2">
          <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
            Tambah Gelombang Baru
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
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
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
                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
              </div>
            </th>
            <th class="min-w-125px">User</th>
            <th class="min-w-125px">Role</th>
            <th class="min-w-125px">Last login</th>
            <th class="min-w-125px">Two-step</th>
            <th class="min-w-125px">Joined Date</th>
            <th class="text-end min-w-100px">Actions</th>
          </tr>
          <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-6.jpg" alt="Emma Smith" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Emma Smith</a>
                <span>smith@kpmg.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Administrator</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">Yesterday</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>20 Dec 2022, 5:30 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label fs-3 bg-light-danger text-danger">M</div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Melody Macy</a>
                <span>melody@altbox.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Analyst</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">20 mins ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td>
              <div class="badge badge-light-success fw-bold">Enabled</div>
            </td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>21 Feb 2022, 5:20 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-1.jpg" alt="Max Smith" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Max Smith</a>
                <span>max@kt.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Developer</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">3 days ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>25 Jul 2022, 5:30 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-5.jpg" alt="Sean Bean" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Sean Bean</a>
                <span>sean@dellito.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Support</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">5 hours ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td>
              <div class="badge badge-light-success fw-bold">Enabled</div>
            </td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>22 Sep 2022, 2:40 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-25.jpg" alt="Brian Cox" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Brian Cox</a>
                <span>brian@exchange.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Developer</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">2 days ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td>
              <div class="badge badge-light-success fw-bold">Enabled</div>
            </td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>25 Jul 2022, 6:05 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label fs-3 bg-light-warning text-warning">C</div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Mikaela Collins</a>
                <span>mik@pex.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Administrator</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">5 days ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>15 Apr 2022, 8:43 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-9.jpg" alt="Francis Mitcham" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Francis Mitcham</a>
                <span>f.mit@kpmg.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Trial</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">3 weeks ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>22 Sep 2022, 6:43 am</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label fs-3 bg-light-danger text-danger">O</div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Olivia Wild</a>
                <span>olivia@corpmail.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Administrator</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">Yesterday</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>25 Oct 2022, 10:10 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label fs-3 bg-light-primary text-primary">N</div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Neil Owen</a>
                <span>owen.neil@gmail.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Analyst</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">20 mins ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td>
              <div class="badge badge-light-success fw-bold">Enabled</div>
            </td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>05 May 2022, 11:05 am</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-23.jpg" alt="Dan Wilson" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Dan Wilson</a>
                <span>dam@consilting.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Developer</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">3 days ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>21 Feb 2022, 8:43 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label fs-3 bg-light-danger text-danger">E</div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Emma Bold</a>
                <span>emma@intenso.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Support</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">5 hours ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td>
              <div class="badge badge-light-success fw-bold">Enabled</div>
            </td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>19 Aug 2022, 5:20 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-12.jpg" alt="Ana Crown" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Ana Crown</a>
                <span>ana.cf@limtel.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Developer</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">2 days ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td>
              <div class="badge badge-light-success fw-bold">Enabled</div>
            </td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>25 Jul 2022, 11:05 am</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label fs-3 bg-light-info text-info">A</div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Robert Doe</a>
                <span>robert@benko.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Administrator</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">5 days ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>05 May 2022, 11:30 am</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-13.jpg" alt="John Miller" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">John Miller</a>
                <span>miller@mapple.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Trial</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">3 weeks ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>19 Aug 2022, 11:05 am</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label fs-3 bg-light-success text-success">L</div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Lucy Kunic</a>
                <span>lucy.m@fentech.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Administrator</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">Yesterday</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>10 Nov 2022, 2:40 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label fs-3 bg-light-danger text-danger">M</div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Melody Macy</a>
                <span>melody@altbox.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Analyst</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">20 mins ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td>
              <div class="badge badge-light-success fw-bold">Enabled</div>
            </td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>15 Apr 2022, 6:05 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-1.jpg" alt="Max Smith" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Max Smith</a>
                <span>max@kt.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Developer</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">3 days ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>22 Sep 2022, 6:05 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-5.jpg" alt="Sean Bean" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Sean Bean</a>
                <span>sean@dellito.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Support</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">5 hours ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td>
              <div class="badge badge-light-success fw-bold">Enabled</div>
            </td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>05 May 2022, 6:05 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-25.jpg" alt="Brian Cox" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Brian Cox</a>
                <span>brian@exchange.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Developer</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">2 days ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td>
              <div class="badge badge-light-success fw-bold">Enabled</div>
            </td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>15 Apr 2022, 2:40 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label fs-3 bg-light-warning text-warning">C</div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Mikaela Collins</a>
                <span>mik@pex.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Administrator</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">5 days ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>10 Nov 2022, 9:23 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
          <!--begin::Table row-->
          <tr>
            <!--begin::Checkbox-->
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <!--end::Checkbox-->
            <!--begin::User=-->
            <td class="d-flex align-items-center">
              <!--begin:: Avatar -->
              <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                <a href="../../demo30/dist/apps/user-management/users/view.html">
                  <div class="symbol-label">
                    <img src="assets/media/avatars/300-9.jpg" alt="Francis Mitcham" class="w-100" />
                  </div>
                </a>
              </div>
              <!--end::Avatar-->
              <!--begin::User details-->
              <div class="d-flex flex-column">
                <a href="../../demo30/dist/apps/user-management/users/view.html" class="text-gray-800 text-hover-primary mb-1">Francis Mitcham</a>
                <span>f.mit@kpmg.com</span>
              </div>
              <!--begin::User details-->
            </td>
            <!--end::User=-->
            <!--begin::Role=-->
            <td>Trial</td>
            <!--end::Role=-->
            <!--begin::Last login=-->
            <td>
              <div class="badge badge-light fw-bold">3 weeks ago</div>
            </td>
            <!--end::Last login=-->
            <!--begin::Two step=-->
            <td></td>
            <!--end::Two step=-->
            <!--begin::Joined-->
            <td>22 Sep 2022, 10:10 pm</td>
            <!--begin::Joined-->
            <!--begin::Action=-->
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
              <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
              <span class="svg-icon svg-icon-5 m-0">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                </svg>
              </span>
              <!--end::Svg Icon--></a>
              <!--begin::Menu-->
              <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="../../demo30/dist/apps/user-management/users/view.html" class="menu-link px-3">Edit</a>
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
        </tbody>
        <!--end::Table body-->
      </table>
    </div>
  </div>
  <!--end::Card body-->
@endsection