import { NgModule } from '@angular/core';

import {
  MatFormFieldModule,
  MatButtonModule,
  MatDialogModule,
  MatInputModule,
  MatRadioModule,
  MatCardModule,

} from '@angular/material';

@NgModule({
  imports: [
    MatFormFieldModule,
    MatButtonModule,
    MatDialogModule,
    MatInputModule,
    MatRadioModule,
    MatCardModule,

  ],
  declarations: [],
  exports: [
    MatFormFieldModule,
    MatButtonModule,
    MatDialogModule,
    MatInputModule,
    MatRadioModule,
    MatCardModule

  ]
})
export class MaterialModule { }
