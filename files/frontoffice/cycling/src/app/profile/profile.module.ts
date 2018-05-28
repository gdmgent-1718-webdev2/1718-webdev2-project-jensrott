import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { NoAccountPageComponent } from './pages/noaccount-page/noaccount-page.component';
import { RegisterPageComponent } from './pages/register-page/register-page.component';
import { ProfilePageComponent } from './pages/profile-page/profile-page.component';
import { EditProfilePageComponent } from './pages/edit-profile-page/edit-profile-page.component';
import { OwnAuctionsPageComponent } from './pages/own-auctions-page/own-auctions-page.component';
import { ProfileDeleteModalComponent } from './components/profile-delete-modal/profile-delete-modal.component';
/* Extern Modules */
import { CardModule } from '../card/card.module';



@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    CardModule
  ],
  declarations: [NoAccountPageComponent,
    RegisterPageComponent,
     ProfilePageComponent,
     EditProfilePageComponent,
     OwnAuctionsPageComponent,
     ProfileDeleteModalComponent
    ],
  exports: [NoAccountPageComponent],
})
export class ProfileModule { }
