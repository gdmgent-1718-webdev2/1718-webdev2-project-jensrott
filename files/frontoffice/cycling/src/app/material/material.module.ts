import { NgModule } from '@angular/core';
import {MatCardModule, MatSidenavModule} from '@angular/material';

@NgModule({
  imports: [
    MatCardModule,
    MatSidenavModule,
  ],
  declarations: [],
  exports: [
    MatCardModule,
    MatSidenavModule,
  ]
})
export class MaterialModule { }
