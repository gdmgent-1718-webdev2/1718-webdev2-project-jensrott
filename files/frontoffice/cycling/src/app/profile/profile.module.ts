import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ProfilePageComponent } from './pages/profile-page/profile-page.component';
@NgModule({
  imports: [
    CommonModule
  ],
  declarations: [ProfilePageComponent],
  exports: [ProfilePageComponent],
})
export class ProfileModule { }
