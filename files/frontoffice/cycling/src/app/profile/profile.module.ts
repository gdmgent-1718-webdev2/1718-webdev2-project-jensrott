import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProfilePageComponent } from './pages/profile-page/profile-page.component';
import { RegisterPageComponent } from './pages/register-page/register-page.component';
@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [ProfilePageComponent, RegisterPageComponent],
  exports: [ProfilePageComponent],
})
export class ProfileModule { }
