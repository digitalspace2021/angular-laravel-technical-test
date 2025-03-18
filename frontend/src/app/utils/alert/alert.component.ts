import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-alert',
  standalone: true,
  templateUrl: './alert.component.html',
  styleUrl: './alert.component.css',
})
export class AlertComponent {
  @Input() errors: Record<string, string[]> = {};
  @Input() type: string = 'danger';
  @Input() message: string = '';

  get errorKeys(): string[] {
    return Object.keys(this.errors || {});
  }
}
