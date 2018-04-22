import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { NoAccountPageComponent } from './pages/noaccount-page/noaccount-page.component';
import { RegisterPageComponent } from './pages/register-page/register-page.component';
import { ProfilePageComponent } from './pages/profile-page/profile-page.component';


@NgModule({
  imports: [
    CommonModule,
    FormsModule,
  ],
  declarations: [NoAccountPageComponent, RegisterPageComponent, ProfilePageComponent],
  exports: [NoAccountPageComponent],
})
export class ProfileModule { }
