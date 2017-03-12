Summary: NethServer configuration for php settings
Name: nethserver-phpsettings
Version: 1.0.0
Release: 5%{?dist}
License: GPL
Source: %{name}-%{version}.tar.gz
BuildArch: noarch
URL: http://dev.nethserver.org/projects/nethforge/wiki/%{name}
BuildRequires: nethserver-devtools

AutoReq: no
Requires: nethserver-httpd, nethserver-php, nethserver-ibays


%description
NethServer configuration for php settings

%prep
%setup

%post

%preun

%build
%{makedocs}
perl createlinks

%install
rm -rf $RPM_BUILD_ROOT
(cd root   ; find . -depth -print | cpio -dump $RPM_BUILD_ROOT)

%{genfilelist} $RPM_BUILD_ROOT > e-smith-%{version}-filelist

%clean 
rm -rf $RPM_BUILD_ROOT

%files -f e-smith-%{version}-filelist
%defattr(-,root,root)
%doc COPYING

%changelog
* Sun Mar 12 2017 Stephane de Labrusse <stephdl@de-labrusse.fr> - 1.0.0-5-ns6
- GPL license

* Sun May 3 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> - 1.0.0-4-ns6
- disclamer

* Mon Apr 27 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> - 1.0.0-3-ns6
- Added Validators, thanks davidep

* Tue Apr 7 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> - 1.0.0-2-ns6
- Added Italian translation (written in english, sorry)
- Corrected the lack of help page

* Sat Mar 7 2015 Stephane de Labrusse <stephdl@de-labrusse.fr> - 1.0.0-1-ns6
- Initial release
