import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { NoAccountPageComponent } from './pages/noaccount-page/noaccount-page.component';
import { RegisterPageComponent } from './pages/register-page/register-page.component';
import { ProfilePageComponent } from './pages/profile-page/profile-page.component';
import { EditProfilePageComponent } from './pages/edit-profile-page/edit-profile-page.component';
import { OwnAuctionsPageComponent } from './pages/own-auctions-page/own-auctions-page.component';
import { TextDialogComponent } from './components/text-dialog/text-dialog.component';

/* Extern Modules */
import { CardModule } from '../card/card.module';
import { MaterialModule } from '../material/material.module';
import { DeleteButtonComponent } from './components/delete-button/delete-button.component';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    CardModule,
    MaterialModule,
  ],
  declarations: [
     NoAccountPageComponent,
     RegisterPageComponent,
     ProfilePageComponent,
     EditProfilePageComponent,
     OwnAuctionsPageComponent,
     TextDialogComponent,
     DeleteButtonComponent
    ],
  exports: [NoAccountPageComponent, DeleteButtonComponent],
  entryComponents: [TextDialogComponent]
  /* This will allow Angular to compile those components into component
    factories and therefore allow the component resolver
     to add them to the internal map used for component resolution. */
})
export class ProfileModule { }
